<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/get/products', [App\Http\Controllers\ProductController::class, 'getData']);
Route::get('/products/search', [App\Http\Controllers\ProductController::class, 'search']);


Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::put('/cart/{product}',[App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.product.update');
Route::delete('/cart/{product}',[App\Http\Controllers\CartController::class, 'destroy'])->name('cart.product.destroy');
Route::get('/cart/all',[App\Http\Controllers\CartController::class,'deleteAll'])->name('cart.destroy');

Route::get('/addToCart/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
