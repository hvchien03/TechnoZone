<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\OrderHistoryController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Middleware\EnsureCartIsAccessedByAuthenticatedUser;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
});

Route::middleware(EnsureCartIsAccessedByAuthenticatedUser::class)->group(function () {
    Route::prefix('/cart')->group(function () {
        Route::get('', [CartController::class, 'index'])->name('cart');
        Route::post('/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
        Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    });

    //checkout

    Route::prefix('/checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/process', [CheckoutController::class, 'process'])->name('process');
        Route::get('/success', [CheckoutController::class, 'success'])->name('success');
        Route::post('/create-momo-payment', [CheckoutController::class, 'createMomoPayment'])->name('create_momo_payment');
        Route::get('/momo-callback', [CheckoutController::class, 'momoCallback'])->name('momo_callback');
    });

    Route::prefix('/orderHistory')->group(function () {
        Route::get('', [OrderHistoryController::class, 'index'])->name('orderhistory.index');
        Route::get('/show/{orderId}', [OrderHistoryController::class, 'show'])->name('orderhistory.show');
    });
});

Route::prefix('/product')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('product');
    Route::get('show/{id}', [ProductController::class, 'show'])->name('product.show');
});

Route::prefix('/service')->group(function () {
    Route::get('', [ServiceController::class, 'index'])->name('service');
});

//user
Route::prefix('/auth')->group(function () {
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

//api province
Route::prefix('/api')->group(function () {
    Route::get('provinces', [AddressController::class, 'getProvinces'])->name('api.provinces');
    Route::get('districts/{province}', [AddressController::class, 'getDistricts'])->name('api.districts');
    Route::get('wards/{district}', [AddressController::class, 'getWards'])->name('api.wards');
});
