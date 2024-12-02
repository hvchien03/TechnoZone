<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;

//admin page
Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');

//products
Route::prefix('products')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('products.index');
    Route::match(['get', 'post'], 'create', [ProductController::class, 'create'])->name('products.create');
    Route::match(['get', 'put'], 'update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
});

Route::prefix('promotions')->group(function () {
    Route::get('', [PromotionController::class, 'index'])->name('promotions.index');
    Route::get('show/{id}', [PromotionController::class, 'show'])->name('promotions.show');
    Route::match(['get', 'post'], 'create', [PromotionController::class, 'create'])->name('promotions.create');
    Route::match(['get', 'patch'], 'update/{id}', [PromotionController::class, 'update'])->name('promotions.update');
    Route::get('delete/{id}', [PromotionController::class, 'delete'])->name('promotions.delete');
});
