<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\PromotionService;
use App\Http\Requests\PromotionRequest;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $promotionService;
    protected $productService;
    public function __construct(PromotionService $_promotionService, ProductService $_productService)
    {
        $this->promotionService = $_promotionService;
        $this->productService = $_productService;
    }

    public function index()
    {
        $list_Promotion = $this->promotionService->getAll();
        return view('admin.promotion.index', compact('list_Promotion'));
    }
    public function show($id)
    {
        $promotion = $this->promotionService->find($id);
        $products = $this->promotionService->getProductsPromotion($id);
        return view('admin.promotion.show', compact('promotion', 'products'));
    }

    public function create()
    {
        if (request()->isMethod('get')) {
            $products = $this->productService->getAllProducts();
            return view('admin.promotion.create', compact('products'));
        }

        if (request()->isMethod('post')) {
            $request = app(PromotionRequest::class);
            $data = $request->validated();
            try {
                $this->promotionService->create($data);
                return redirect()->route('promotions.index');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    public function update($id)
    {
        if (request()->isMethod('get')) {
            $promotion = $this->promotionService->find($id);
            $products = $this->productService->getAllProducts();
            $promotionalProducts = $this->promotionService->getProductsPromotion($id);
            return view('admin.promotion.update', compact('promotion', 'promotionalProducts', 'products'));
        } else if (request()->isMethod('patch')) {
            $request = app(PromotionRequest::class);
            $data = $request->validated();
            try {
                $this->promotionService->update($id, $data);
                return redirect()->route('promotions.index');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    public function delete($id)
    {
        try {
            $this->promotionService->delete($id);
            return redirect()->route('promotions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
