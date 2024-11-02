<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class,'home'])->name('home');
Route::get('/contact', [FrontEndController::class,'contact'])->name('contact');
Route::get('/about', [FrontEndController::class,'about'])->name('about');
Route::get('/vegetables', [FrontEndController::class,'vegetables'])->name('vegetables');
Route::get('/fruits', [FrontEndController::class,'fruits'])->name('fruits');
Route::get('/products/{categories}/{name}', [FrontEndController::class,'product'])->name('product');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
