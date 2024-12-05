<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderHistoryController extends Controller
{
    public function index(Request $request)
    {
        // Lấy userId từ request hoặc từ user đã đăng nhập
        $userId = $request->user()->id ?? $request->input('userId');

        // Kiểm tra userId có hợp lệ không
        if (!$userId) {
            return redirect()->route('home');
        }

        // Lấy lịch sử đơn hàng
        $orders = Order::where('userId', $userId)->get();

        return view('client.orderhistory.index', compact('orders'));
    }

    /**
     * Xem chi tiết một đơn hàng cụ thể.
     */
    public function show($orderId)
    {
        // Tìm tài liệu có chứa orderId trong mảng orders
        $document = Order::where('orders.orderId', $orderId)->first();
    
        if (!$document) {
            abort(404, 'Đơn hàng không tồn tại.');
        }
    
        // Lọc để lấy đúng đơn hàng từ mảng orders
        $order = collect($document->orders)->firstWhere('orderId', $orderId);

        if (!$order) {
            abort(404, 'Chi tiết đơn hàng không tồn tại.');
        }
        // Thêm thuộc tính image vào từng sản phẩm trong mảng products
        $products = collect($order['products'])->map(function ($product) {
            $productModel = Product::find($product['product_id']);
            $product['image'] = $productModel ? $productModel->image : null;
            $product['name'] = $productModel->productName;
            return $product;
        });

        // Cập nhật lại mảng products trong order
        $order['products'] = $products;
    
        return view('client.orderhistory.show', compact('order'));
    }
    
}