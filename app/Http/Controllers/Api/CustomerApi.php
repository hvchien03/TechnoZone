<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
use App\Models\Product;

class CustomerApi extends Controller
{
    public function search(Request $request)
    {
        try {
            $phone = $request->input('phone');

            $customer = User::where('phone', $phone)
                          ->where('role', 'user')
                          ->first();

            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy khách hàng'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'customer' => [
                    'id' => $customer->_id,
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'address' => $customer->address
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }

    public function orders(Request $request)
    {
        try {
            $userId = $request->input('userId');
            $order = Order::where('userId', new ObjectId($userId))->first(); // ke cai thang nay di no bi ngu

            if (!$order || empty($order->orders)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy đơn hàng'
                ], 404);
            }

            $formattedOrders = collect($order->orders)->map(function($orderItem) {
                return [
                    'id' => $orderItem['orderId'],
                    'date' => \Carbon\Carbon::parse($orderItem['date'])->format('d/m/Y'),
                    'total' => number_format($orderItem['total'], 0, ',', '.') . ' VNĐ',
                    'status' => $orderItem['deliveryStatus'],
                    'products' => collect($orderItem['products'])->map(function($product) {
                        $productInfo = Product::find($product['productId']);
                        return [
                            'productId' => $product['productId'],
                            'productName' => $productInfo->productName,
                            'quantity' => $product['quantity'],
                            'price' => number_format($product['price'], 0, ',', '.') . ' VNĐ'
                        ];
                    })
                ];
            });

            return response()->json([
                'success' => true,
                'orders' => $formattedOrders
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ], 500);
        }
    }
}
