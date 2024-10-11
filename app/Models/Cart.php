<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Cart extends Model //giỏ hàng
{
    use HasFactory;
    protected $collection = 'cart';
    protected $connection = 'mongodb';
    protected $fillable = [
        'userId',
        'products'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId', '_id');
    }
    //Bỏ vào phần dịch vụ
    // public function addToCart($product)
    // {
    //     $products = $this->products ?: [];
    //     $found = false;

    //     foreach ($products as &$item) {
    //         if ($item['product_id'] == $product['product_id']) {
    //             (int)$item['quantity'] += (int)$product['quantity'];
    //             $found = true;
    //             break;
    //         }
    //     }

    //     if (!$found) {
    //         $products[] = $product;
    //     }

    //     $this->products = $products;
    //     $this->total = array_reduce($products, function ($total, $item) {
    //         return $total + ($item['quantity'] * $item['price']);
    //     }, 0);

    //     $this->save();
    // }
    // public function removeFromCart($productId)
    // {
    //     $products = $this->products ?: [];

    //     foreach ($products as $key => $item) {
    //         if ($item['product_id'] == $productId) {
    //             unset($products[$key]);
    //             break;
    //         }
    //     }
    //     $products = array_values($products);
    //     $this->products = $products;
    //     $this->total = array_reduce($products, function ($total, $item) {
    //         return $total + ($item['quantity'] * $item['price']);
    //     }, 0);
    //     $this->save();
    //     if (count($products) == 0) {
    //         $this->delete();
    //     }
    // }
    // public function updateQuantity($product_id, $quantity)
    // {
    //     $products = $this->products ?: [];
    //     foreach ($products as $key => $item) {
    //         if ($item['product_id'] == $product_id) {
    //             $products[$key]['quantity'] = $quantity;
    //             break;
    //         }
    //     }
    //     $this->products = $products;
    //     $this->total = array_reduce($products, function ($total, $item) {
    //         return $total + ($item['quantity'] * $item['price']);
    //     }, 0);
    //     $this->save();
    // }
}
