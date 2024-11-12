<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CartService;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['frontend.components.cart','frontend.components.header'], function ($view) {
            $cartService = app(CartService::class); 
            $data = $cartService->getCartItems();
            $view->with('cartItems', $data['cart']); 
            $view->with('totalPrice', $data['totalPrice']); 
            $view->with('cartCount', $data['cartCount']); 
        });
    }
}
