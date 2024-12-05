<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Api\CustomerApi;
use App\Http\Controllers\Admin\OrderController;
//admin page
Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home');

Route::prefix('admin')->group(function () {

    //products
    Route::match(['get', 'post'], '/import-products', [ProductController::class, 'importProduct'])->name('products.import');
    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('products.index');
        Route::match(['get', 'post'], 'create', [ProductController::class, 'create'])->name('products.create');
        Route::match(['get', 'put'], 'update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    });

    //supplier
    Route::prefix('suppliers')->group(function () {
        Route::get('', [SupplierController::class, 'index'])->name('suppliers.index');
        Route::match(['get', 'post'], 'create', [SupplierController::class, 'create'])->name('suppliers.create');
        Route::match(['get', 'put'], 'update/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
        Route::delete('delete/{id}', [SupplierController::class, 'delete'])->name('suppliers.delete');
    });

    //category
    Route::prefix('categories')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('categories.index');
        Route::match(['get', 'post'], 'create', [CategoryController::class, 'create'])->name('categories.create');
        Route::match(['get', 'put'], 'update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });

    Route::prefix('promotions')->group(function () {
        Route::get('', [PromotionController::class, 'index'])->name('promotions.index');
        Route::get('show/{id}', [PromotionController::class, 'show'])->name('promotions.show');
        Route::match(['get', 'post'], 'create', [PromotionController::class, 'create'])->name('promotions.create');
        Route::match(['get', 'patch'], 'update/{id}', [PromotionController::class, 'update'])->name('promotions.update');
        Route::get('delete/{id}', [PromotionController::class, 'delete'])->name('promotions.delete');
    });

    Route::prefix('customers')->group(function () {
        Route::get('', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('update', [CustomerController::class, 'update'])->name('customer.update');
        Route::post('store', [CustomerController::class, 'store'])->name('customer.store');
    });

    Route::prefix('service')->group(function () {
        Route::get('', [ServiceController::class, 'index'])->name('admin.service.index');
        Route::get('create', [ServiceController::class, 'create'])->name('admin.service.create');
        Route::get('details/{id}', [ServiceController::class, 'details'])->name('admin.service.details');
        Route::post('update', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::post('store', [ServiceController::class, 'store'])->name('admin.service.store');
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });
});

Route::prefix('api')->group(function () {
    Route::get('customers/search', [CustomerApi::class, 'search'])->name('api.customer.search');
    Route::get('customers/orders', [CustomerApi::class, 'orders'])->name('api.customer.orders');
});


