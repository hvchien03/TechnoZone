<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\AuthController;


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

Route::prefix('/product')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('product');
    Route::get('show', [ProductController::class, 'show'])->name('product.show');
    // Route::get('show/{id}', [ProductController::class, 'show'])->name('product.show');
});

//user
Route::prefix('/auth')->group(function () {
    Route::get('', [AuthController::class, 'index'])->name('auth');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], 'register', [AuthController::class, 'register'])->name('register');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
