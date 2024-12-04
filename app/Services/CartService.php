<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Product;


class CartService
{

    private $collection;
    public function __construct()
    {
        $this->collection = DB::connection('mongodb')->getCollection('cart');
    }
    public function getTotal()
    {
        $cart = $this->getContent();
        return $cart->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function getContent()
    {
        try {
            $userId = Auth::id() ?? session()->getId();
            
            $cart = Cart::where('userId', $userId)->first();
            Log::info('Cart data:', ['cart' => $cart]);
            
            if (!$cart || empty($cart->products)) {
                Log::info('No cart found or empty products');
                return collect([]);
            }
            
            $mappedProducts = collect($cart->products)->map(function ($product) {
                $productDetails = Product::find($product['product_id'] ?? null);
                return [
                    'id' => $product['product_id'] ?? '',
                    'name' => $productDetails->productName ?? '',
                    'price' => (float) ($product['price'] ?? 0),
                    'quantity' => (int) ($product['quantity'] ?? 0),
                    'image' => $product['image'] ?? '',
                    'subtotal' => (float) ($product['price'] ?? 0) * (int) ($product['quantity'] ?? 0)
                ];
            });
            
            Log::info('Mapped products:', ['products' => $mappedProducts]);
            return $mappedProducts;
            
        } catch (\Exception $e) {
            Log::error('Cart error:', ['error' => $e->getMessage()]);
            return collect([]);
        }
    }
    public function clear(){
        try {
            $userId = Auth::id() ?? 'guest_' . session()->getId();
            Cart::where('userId', $userId)->delete();
        } catch (\Exception $e) {
            Log::error('Error clearing cart: ' . $e->getMessage());
        }
    }
}