<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\ServiceController;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
});

Route::prefix('/cart')->group(function () {
    Route::get('', [CartController::class, 'index'])->name('cart');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
});

Route::prefix('/blog')->group(function () {
    Route::get('', [BlogController::class, 'index'])->name('blog');
    Route::get('show', [BlogController::class, 'show'])->name('blog.show');
    // Route::get('show/{id}', [BlogController::class, 'show'])->name('blog.show');
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
    Route::get('', [AuthController::class, 'index'])->name('auth');
    Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
