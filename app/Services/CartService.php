<?php
namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartService
{


public function getCartItems() {
    $visitorId = Session::get('visitor_id');

    $cartItems = Cart::with('product')
    ->where('visitor_id', $visitorId)
    ->get();

    $cartCount = $cartItems->count();

    
    if (!$visitorId) {
        return [
            'cart'          => [],
            'totalPrice'    => 0,
            'cartCount'     => $cartCount,
        ];
    }


    $totalPrice = $cartItems->sum(function ($item) {
                        if($item->product->new_price > 0) {
                            return $item->product->new_price * $item->quantity;
                        }
                        else {
                            return $item->product->price * $item->quantity;
                        }
                    });
    

    return [
        'cart'          => $cartItems,
        'totalPrice'    => $totalPrice,
        'cartCount'     => $cartCount,
    ];
}

}