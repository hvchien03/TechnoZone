<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Api\AddressController;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
});

Route::prefix('/blog')->group(function () {
    Route::get('', [BlogController::class, 'index'])->name('blog');
    Route::get('show', [BlogController::class, 'show'])->name('blog.show');
    // Route::get('show/{id}', [BlogController::class, 'show'])->name('blog.show');
});

// Route::prefix('/product')->group(function () {
//     Route::get('', [ProductController::class, 'index'])->name('product');
//     Route::get('show', [ProductController::class, 'show'])->name('product.show');
//     // Route::get('show/{id}', [ProductController::class, 'show'])->name('product.show');
// });

// //user
Route::prefix('/auth')->group(function () {
    Route::get('', [AuthController::class, 'index'])->name('auth');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/checkout')->group(function (){
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/process', [CheckoutController::class, 'process'])->name('process');
    Route::get('/success', [CheckoutController::class, 'success'])->name('success');
    Route::post('/create-momo-payment', [CheckoutController::class, 'createMomoPayment'])->name('create_momo_payment');
    Route::get('/momo-callback', [CheckoutController::class, 'momoCallback'])->name('momo_callback');
});

Route::prefix('/api')->group(function () {
    Route::get('provinces', [AddressController::class, 'getProvinces'])->name('api.provinces');
    Route::get('districts/{province}', [AddressController::class, 'getDistricts'])->name('api.districts');
    Route::get('wards/{district}', [AddressController::class, 'getWards'])->name('api.wards');
});