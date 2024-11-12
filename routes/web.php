<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
require_once __DIR__ . '/jetstream.php';

Route::get('/', [FrontEndController::class,'home'])->name('home');
Route::post('/',[FrontEndController::class,'storeNewsletter'])->name('newsletter.store');
Route::get('/contact', [FrontEndController::class,'contact'])->name('contact');
Route::get('/about', [FrontEndController::class,'about'])->name('about');
Route::get('/vegetables', [FrontEndController::class,'vegetables'])->name('vegetables');
Route::get('/fruits', [FrontEndController::class,'fruits'])->name('fruits');
Route::get('/products/{categories}/{name}/{id}', [FrontEndController::class,'product'])->name('product');
Route::post('/cart/{id}',[FrontEndController::class,'storeCart'])->name('cart.store');
Route::delete('/cart/{id}', [FrontEndController::class, 'delete'])->name('cart.delete');
Route::get('/search',[FrontEndController::class,'search'])->name('search.index');
Route::get("/checkout",[FrontEndController::class,'checkout'])->name("checkout");
Route::post("/checkout",[FrontEndController::class,'checkoutStore'])->name("checkout.store");
Route::post("/checkoutConfirmTime/{id}",[FrontEndController::class,'checkoutConfirmTime'])->name("checkoutConfirmTime");
Route::post('/contact',[FrontEndController::class,'contactForm'])->name('contact.store');

Route::middleware([
    'authAdmin',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/products',\App\Livewire\Products\ProductIndex::class)->name('products');
    Route::get('/products/create',\App\Livewire\Products\ProductCreate::class)->name('products.create');
    Route::get('/products/update/{id}',\App\Livewire\Products\ProductUpdate::class)->name('products.update');
    Route::get('/orders',\App\Livewire\Order\OrderIndex::class)->name('orders');
    Route::get('/inscrits',\App\Livewire\Inscrit\InscritIndex::class)->name('inscrits');

});

