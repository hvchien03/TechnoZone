<?php   

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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

    public function updateStatus(Request $request, $orderId)
    {
        
        try {
            $request->validate([
                'deliveryStatus' => 'required|in:Đang xử lý,Đang vận chuyển,Đã giao hàng,Đã hủy'
            ]);

            $result = Order::raw()->updateOne(
                ['orders.orderId' => $orderId],
                [
                    '$set' => [
                        'orders.$[order].deliveryStatus' => $request->deliveryStatus,
                        // Update payment status if cancelled
                        'orders.$[order].paymentStatus' => $request->deliveryStatus === 'Đã hủy' ? 'Đã hủy' : 'Thành công'
                    ]
                ],
                [
                    'arrayFilters' => [
                        ['order.orderId' => $orderId]
                    ]
                ]
            );
    
            if ($result->getModifiedCount() === 0) {
                Log::error('Order not found or not modified', ['orderId' => $orderId]);
                return back()->with('error', 'Không thể cập nhật trạng thái đơn hàng');
            }
    
            return back()->with('success', 'Cập nhật trạng thái đơn hàng thành công');
        } catch (\Exception $e) {
            Log::error('Error updating order status: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi cập nhật trạng thái đơn hàng');
        }
    }
}