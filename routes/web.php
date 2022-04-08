<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home.index');
})->name('home.index');
Route::get('/home', function () {
    return view('home.index');
})->name('home.index');


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/products', ProductController::class)->only(['index', 'show']);
Route::get('productSearch', [ProductController::class, 'search'])->name('product.search');

Route::get('/addToCart/{id}',[ProductController::class, 'addToCart'])->name("product.addToCart");
Route::get('/removeFromCart/{id}',[ProductController::class, 'removeFromCart'])->name("product.removeFromCart");

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/emptyCart', [CartController::class, 'empty'])->name('cart.empty');

Route::resource('/order', OrderController::class)->only(['index', 'show', 'create', 'store']);


Auth::routes();

