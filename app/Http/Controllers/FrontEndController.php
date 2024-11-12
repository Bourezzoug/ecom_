<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Inscrit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Validation\Rule;

class FrontEndController extends Controller
{
    public function home()
    {
        $vegetables = Product::where('category_id', 1)
            ->orderByRaw("CASE WHEN percentage IS NOT NULL THEN 0 ELSE 1 END, created_at DESC")
            ->get();
    
        $fruits = Product::where('category_id', 2)
            ->orderByRaw("CASE WHEN percentage IS NOT NULL THEN 0 ELSE 1 END, created_at DESC")
            ->get();
    
        return view('frontend.home.index', [
            'vegetables' => $vegetables,
            'fruits' => $fruits
        ]);
    }
    public function contact() {
        return view('frontend.contact.index');
    }
    public function about() {
        return view('frontend.about.index');
    }
    public function vegetables() {
        $vegetables = Product::where('category_id', 1)
        ->orderByRaw("CASE WHEN percentage IS NOT NULL THEN 0 ELSE 1 END, created_at DESC")
        ->paginate(12);
        return view('frontend.shop.vegetable',[
            'vegetables'    =>  $vegetables
        ]);
    }
    public function fruits() {
        $fruits = Product::where('category_id', 2)
        ->orderByRaw("CASE WHEN percentage IS NOT NULL THEN 0 ELSE 1 END, created_at DESC")
        ->paginate(12);
        return view('frontend.shop.fruit',[
            'fruits'    =>  $fruits
        ]);
    }
    public function product($categorie, $name, $id) {
        $product = Product::findOrFail($id);
        $products = Product::where('category_id',1)
        ->orderByRaw("CASE WHEN percentage IS NOT NULL THEN 0 ELSE 1 END, created_at DESC")
        ->whereNot('id',$product->id)
        ->take(4)
        ->get();
        return view('frontend.shop.product',[
            'product'   =>  $product,
            'products'  =>  $products
        ]);
    }

    public function storeCart($id, Request $request) {
        // Validate the product ID
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:products,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['product_no_exist' => 'This product does not exist']);
        }
    
        // Check for an existing visitor ID in the session or create a new one
        if (!Session::has('visitor_id')) {
            $visitorId = (string) Str::uuid();
            Session::put('visitor_id', $visitorId);
        } else {
            $visitorId = Session::get('visitor_id');
        }

        $existingCartItem = Cart::where('visitor_id', $visitorId)
        ->where('product_id', $id)
        ->first();

        if ($existingCartItem) {
            return response()->json(['success' => false, 'message' => 'Product is already in the cart']);
        }else {
        // Retrieve cart item details
        $quantity = $request->quantity;
    
        // Store cart item in the database using visitor_id
        $cartItem = Cart::Create(
            [
                'visitor_id' => $visitorId,
                'product_id' => $id,
                'quantity' => $quantity,
                'quantityType' => $request->quantityType ?? null,
            ]
        );

        $cart = Cart::with('product.category')
                ->where('visitor_id', $visitorId)
                ->get();
        $cartCount = $cart->count();
                

        $totalPrice = $cart->sum(function ($item) {
            if($item->product->new_price > 0) {
                return $item->product->new_price * $item->quantity;
            }
            else {
                return $item->product->price * $item->quantity;
            }
        });
    
        return response()->json([
            'success'       => 'Product added to cart',
            'cart'          =>  $cart,
            'totalPrice'    =>  $totalPrice,
            'cartCount'     =>  $cartCount,
        ]);
        }
    

    }


    public function delete($id) {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:carts,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['product_no_exist' => 'This product do not exist']);
        }
    
        if (!Session::has('visitor_id')) {
            $visitorId = (string) Str::uuid();
            Session::put('visitor_id', $visitorId);
        } else {
            $visitorId = Session::get('visitor_id');
        }
    
        try {
            // First delete the cart item
            $cart = Cart::findOrFail($id);
            $cart->delete();
    
            // Then get updated counts and totals
            $cartItems = Cart::with('product.category')
                ->where('visitor_id', $visitorId)
                ->get();
    
            $cartCount = $cartItems->count();
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->product->new_price > 0 
                    ? $item->product->new_price * $item->quantity 
                    : $item->product->price * $item->quantity;
            });
    
            return response()->json([
                'success' => true,
                'cart_delete' => 'The product is deleted from the cart',
                'totalPrice' => number_format($totalPrice, 2, '.', ''),
                'cartCount' => $cartCount
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'An error occurred while deleting the item'
            ], 500);
        }
    }


    public function search(Request $request) {
        $searchQuery = $request->search;
        $category = $request->category; 
        $minPrice = $request->minPrice; 
        $maxPrice = $request->maxPrice; 
        $sort = $request->sort; 

        $query = Product::where('name', 'LIKE', "%{$searchQuery}%");

        if(!$searchQuery && !$minPrice && !$maxPrice && !$sort) {
            return redirect()->back();
        }

        if($minPrice || $maxPrice) {
            $query->where(function($q) use ($minPrice, $maxPrice) {
                if ($minPrice) {
                    $q->where('price', '>=', $minPrice);
                }
                if ($maxPrice) {
                    $q->where('price', '<=', $maxPrice);
                }
            });
        }

        if ($sort) {
            switch ($sort) {
                case 'name-a-to-z':
                    $query->orderBy('name', 'asc')->where('category_id',$category);
                    break;
                case 'name-z-to-a':
                    $query->orderBy('name', 'desc')->where('category_id',$category);
                    break;
                case 'price-low-to-high':
                    $query->orderBy('price', 'asc')->where('category_id',$category);
                    break;
                case 'price-high-to-low':
                    $query->orderBy('price', 'desc')->where('category_id',$category);
                    break;

                default: 
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }

        $products = $query->paginate(12);
        
        return view('frontend.search.index',[
            'products'  => $products 
        ]);
    }

    public function checkout() {
        if (!Session::has('visitor_id')) {
            $visitorId = (string) Str::uuid();
            Session::put('visitor_id', $visitorId);
        } else {
            $visitorId = Session::get('visitor_id');
        }
        $cart = Cart::where("visitor_id",$visitorId)->get();
        $cartItems = Cart::with('product.category')
        ->where('visitor_id', $visitorId)
        ->get();
        $cartCount = $cartItems->count();
                

        $totalPrice = $cartItems->sum(function ($item) {
            if($item->product->new_price > 0) {
                return $item->product->new_price * $item->quantity;
            }
            else {
                return $item->product->price * $item->quantity;
            }
        });

        if($totalPrice >= 199) {
            $totalPrice = $totalPrice;
        }
        else {
            $totalPrice = $totalPrice + 10;
        }
        return view("frontend.checkout.index",[
            'cart'          =>  $cart,
            'totalPrice'    =>  $totalPrice
        ]);
    }

    



    public function checkoutStore(Request $request) {
        // $cartData = new stdClass(); // Create an empty object
        $validator = Validator::make($request->all(), [
            'email'             => 'required|email',
            'first_name'        => 'required|string',
            'family_name'       => 'required|string',
            'address'           => 'required|string',
            'phone_number'      => 'required',
            'city'              => 'required|string',
            // 'payment'           => 'required|string',
            'province'          => 'required|string',
            'postal_code'       => 'required',
            'delivery_time'     => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Session::has('visitor_id')) {
            $visitorId = (string) Str::uuid();
            Session::put('visitor_id', $visitorId);
        } else {
            $visitorId = Session::get('visitor_id');
        }

        $cartItems = Cart::where("visitor_id",$visitorId)->get();
        $total_price = $cartItems->sum(function ($item) {
            if($item->product->new_price > 0) {
                return $item->product->new_price * $item->quantity;
            }
            else {
                return $item->product->price * $item->quantity;
            }
        });
        $cartItemObjects = $cartItems->map(function ($item) {
            return (object) [
                'product_id' => $item->product->id,
                'product' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ];
        })->toArray();
        $data = [
            'visitor_id'        =>  $visitorId,
            'status'            =>  'unpaid',    
            'total_price'       =>  $total_price,
            'email'             =>  $request->email,
            'first_name'        =>  $request->first_name,
            'family_name'       =>  $request->family_name,
            'address'           =>  $request->address,
            'phone_number'      =>  $request->phone_number,
            'city'              =>  $request->city,
            'state_province'    =>  $request->province,
            'postal_code'       =>  $request->postal_code,
            // 'mode_payment'      =>  $request->payment,
            'products_cart'     =>  json_encode($cartItemObjects),
            'delivery_time'     =>  $request->delivery_time,
            'commentaire'       =>  $request->commentaire,
        ];
        $orderInsert;
        if($total_price > 0) {
            $orderInsert = Order::create($data);
        }
        else {
            return response()->json(['success' => false, 'message' => 'Votre carte est vide']);
        }
        $cartItems = Cart::where("visitor_id",$visitorId)->delete();
        return response()->json(['success' => true, 'message' => 'Notre support vous contactera pour confirmer.','id' => $orderInsert->id]);
    }
    public function checkoutConfirmTime(Request $request, $id) {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }
        
        try {
            $order->call_time = $request->heure;
            $order->save();
            return response()->json(['message' => 'Thank you for your trust.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred. Please try again later.'], 500);
        }
    }
    public function contactForm(Request $request) {
        Mail::to('simobourezzouk@gmail.com')->send(new ContactMail($request->email,$request->nom_complet,$request->telephone,$request->subject,$request->emailMessage));
        return response()->json(['message' => 'Email sent successfully'], 200);
    }
    public function storeNewsletter(Request $request) {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(Inscrit::class)],
            ]);
    
            Inscrit::create([
                'email' => strtolower($request->email),
            ]);
            return response()->json(['message' => 'Merci de rejoindre notre newsletter !'], 200);
        
        } catch (\Exception $e) {
    
            return response()->json(['message' => $e->getMessage()], 422);
        }
        // dd($request->email);
    }
}
