<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Services\SupplierService;

class ProductController extends Controller
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
        return view('client.product.index', compact("products"));
    }
    public function show($id)
    {
        //tìm sản phẩm theo id
        $product = $this->productService->findProductById($id);
        $listProduct = $this->productService->getAllProducts()
        ->where('categoryId', $product->categoryId)
        ->where('_id', '!=', $id)
        ->take(4);
        return view('client.product.show', compact('product', 'listProduct'));
    }
}
