<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;

//admin page
Route::get('', [HomeController::class, 'index'])->name('admin.home');

//products
Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('products.index');
    Route::match(['get', 'post'], 'create', [ProductController::class, 'create'])->name('products.create');
});