<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

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
        // Tìm đơn hàng theo ID
        $order = Order::where('orderId', $orderId)->first();

         return redirect()-> route('orderhistory.show', compact('order'));
    }
}
