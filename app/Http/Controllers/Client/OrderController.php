<?php 

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller{
    public function index(){
        $userId = Auth::id();
        $orders = Order::raw()->aggregate([
            ['$match' => ['userId' => $userId]],
            ['$unwind' => '$orders'],
            ['$sort' => ['orders.date' => -1]]
        ])->toArray();

        return view('client.order.index', compact('orders'));
    }

    public function show($orderId)
    {
        $userId = Auth::id();
        $order = Order::raw()->aggregate([
            ['$match' => ['userId' => $userId]],
            ['$unwind' => '$orders'],
            ['$match' => ['orders.orderId' => $orderId]]
        ])->toArray();

        if (!$order) {
            return redirect()->route('order.index')
                           ->with('error', 'Không tìm thấy đơn hàng');
        }

        $order = $order[0];

        $productIds = collect($order['orders']['products'])->pluck('product_id');
        $products = Product::whereIn('_id', $productIds)->get()->keyBy('_id');

        return view('client.order.show', compact('order', 'products'));
    }
    public function cancel($orderId)
    {
        try {
            $result = Order::raw()->updateOne(
                ['orders.orderId' => $orderId],
                [
                    '$set' => [
                        'orders.$[elem].deliveryStatus' => 'Đã hủy',
                        'orders.$[elem].paymentStatus' => 'Đã hủy'
                    ]
                ],
                [
                    'arrayFilters' => [
                        ['elem.orderId' => $orderId]
                    ]
                ]
            );
    
            if ($result->getModifiedCount() > 0) {
                return redirect()->route('order.index')->with('success', 'Đã hủy đơn hàng thành công');
            }
            return redirect()->route('order.index')->with('error', 'Không thể hủy đơn hàng');
        } catch (\Exception $e) {
            Log::error('Cancel order error:', ['error' => $e->getMessage()]);
            return redirect()->route('order.index')->with('error', 'Có lỗi xảy ra khi hủy đơn hàng');
        }
    }
}