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
        if($item->pack_id != null && $item->product_id) {
            return ($item->product->price * $item->quantity) + $item->pack->price;
        }
        elseif($item->pack_id != null) {
            return $item->pack->price;
        }
        elseif($item->pack_id == null) {
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