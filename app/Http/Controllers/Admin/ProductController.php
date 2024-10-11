<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\CategoryService;
use App\Services\ProductService;
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
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        if (request()->isMethod('get')) {
            $cate = $this->categoryService->getAllCate();
            $supp = $this->supplierService->getAllSupplier();
            return view('admin.product.create', compact('cate', 'supp'));
        } else if (request()->isMethod('post')) {
            $request = app(ProductRequest::class);
            $data = $request->validated();
            try {
                $product = $this->productService->createProduct($data);
                return redirect()->route('products.index')->with('success', 'Product created successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    public function update($id)
    {
        if (request()->isMethod('get')) {
            $product = $this->productService->getProductById($id);
            return view('admin.product.edit', compact('product'));
        } else if (request()->isMethod('put')) {
            $request = app(ProductRequest::class);
            $data = $request->validated();
            try {
                $product = $this->productService->updateProduct($id, $data);
                return redirect()->route('products.index')->with('success', 'Product updated successfully!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    public function delete($id)
    {
        try {
            $this->productService->deleteProduct($id);
            return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
