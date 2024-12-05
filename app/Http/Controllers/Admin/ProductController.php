<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Request;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SupplierService;
use App\Traits\SearchTraits;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $supplierService;
    use SearchTraits;
    public function __construct(ProductService $_productService, CategoryService $_categoryService, SupplierService $_supplierService)
    {
        $this->productService = $_productService;
        $this->categoryService = $_categoryService;
        $this->supplierService = $_supplierService;
    }
    public function index()
    {
        $key = request()->query('key', '');
        $productsQuery = $this->productService->getQuery();

        // Áp dụng tìm kiếm
        $products = $this->applySearch($productsQuery, $key, ['productName', 'configuration'])->paginate(10);

        return view('admin.product.index', compact('products', 'key'));
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
            $product = $this->productService->findProductById($id);
            $cate = $this->categoryService->getAllCate();
            $supp = $this->supplierService->getAllSupplier();
            return view('Admin.Product.update', compact('product', 'cate', 'supp'));
        } else if (request()->isMethod('put')) {
            $request = app(ProductRequest::class);
            $data = $request->validated();

            if (isset($data['stock']) && $data['stock'] > 0) {
                $data['active'] = true; // Gán active = true
            }

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

            // Kiểm tra xem có phải là yêu cầu AJAX không
            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Product deleted successfully!']);
            }

            // Nếu không phải AJAX thì thực hiện redirect
            return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function importProduct(Request $request)
    {
        if (request()->isMethod('get')) {


            $key = request()->query('key', '');
            $productsQuery = $this->productService->getQuery();

            // Áp dụng tìm kiếm
            $products = $this->applySearch($productsQuery, $key, ['productName', 'configuration'])->paginate(10);

            return view('admin.product.import', compact('products', 'key'));
        }
        // $data = $request->validated();
        // try {
        //     $product = $this->productService->importProduct($data);
        //     return redirect()->route('products.index')->with('success', 'Product imported successfully!');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }
}
