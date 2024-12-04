<?php   

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::all();
            if ($orders->isEmpty()) {
                return redirect()->route('home')->with('error', 'No orders found');
            }

            return view('admin.order.index', compact('orders'));
        } catch (\Exception $e) {
            Log::error('Error fetching orders: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Error loading orders');
        }
    }

    public function show($orderId){
        try {
            $order = Order::where('orders.orderId', $orderId)->first();
            if (!$order) {
                return redirect()->route('orders.index')->with('error', 'Order not found');
            }

            $orderDetail = collect($order->orders)->firstWhere('orderId', $orderId);
            
            if (!$orderDetail) {
                return redirect()->route('orders.index')    
                               ->with('error', 'Order not found');
            }

            return view('admin.order.show', compact('orderDetail'));
        } catch (\Exception $e) {
            Log::error('Error fetching order: ' . $e->getMessage());
            return redirect()->route('orders.index')->with('error', 'Error loading order');
        }
    }
}