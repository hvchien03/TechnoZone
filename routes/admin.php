<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\OrderController;

//admin page
Route::get('', [HomeController::class, 'index'])->name('admin.home');

//supplier
Route::prefix('suppliers')->group(function () {
    Route::get('', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::match(['get', 'post'], 'create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::match(['get', 'put'], 'update/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('delete/{id}', [SupplierController::class, 'delete'])->name('suppliers.delete');
});



Route::prefix('promotions')->group(function () {
    Route::get('', [PromotionController::class, 'index'])->name('promotions.index');
    Route::get('show/{id}', [PromotionController::class, 'show'])->name('promotions.show');
    Route::match(['get', 'post'], 'create', [PromotionController::class, 'create'])->name('promotions.create');
    Route::match(['get', 'patch'], 'update/{id}', [PromotionController::class, 'update'])->name('promotions.update');
    Route::get('delete/{id}', [PromotionController::class, 'delete'])->name('promotions.delete');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('show/{id}', [OrderController::class, 'show'])->name('orders.show');
    // Route::get('update-status/{id}', [OrderController::class, 'updateStatus'])->name('orders.update-status');
});