<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SupplierService;

class HomeController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $supplierService;
    public function __construct(ProductService $_productService, CategoryService $_categoryService, SupplierService $_supplierService)
    {
        $this->productService = $_productService;
        $this->categoryService = $_categoryService;
        $this->supplierService = $_supplierService;
    }
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('client.home.index', compact("products"));
    }

    public function contact()
    {
        return view('client.home.contact');
    }
}
