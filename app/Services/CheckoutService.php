<?php
namespace App\Services;

use MongoDB\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use MongoDB\BSON\UTCDateTime;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use function Psy\sh;

class CheckoutService
{
    protected $momoPaymentService;
    protected $mongodb;
    protected $ordersCollection;
    protected $cartsCollection;

    public function __construct(MomoPaymentService $momoPaymentService)
    {
        $this->momoPaymentService = $momoPaymentService;
        $this->mongodb = new Client(env('MONGODB_URI', 'mongodb://localhost:27017'));
        $this->ordersCollection = $this->mongodb->selectDatabase(env('MONGODB_DATABASE', 'TechnoZone'))->selectCollection('order');
        $this->cartsCollection = $this->mongodb->selectDatabase(env('MONGODB_DATABASE', 'TechnoZone'))->selectCollection('cart');
    }

    public function processCheckout($data)
    {
        try {
            Log::info('Processing checkout', ['data' => $data]);
            $userId = Auth::id() ?? session()->getId();  
            $cart = $this->cartsCollection->findOne(['userId' => $userId]);
            if (empty($cart['products'])) {
                throw new \Exception('Cart is empty');
            }
    
            // Calculate total
            $products = $cart['products'];
            $total = collect($cart['products'])->sum(function ($product) {
                return $product['quantity'] * $product['price'];
            });

            $total += 30000;
    
            $orderId = 'order' . time() . Str::random(3);
            $order = [
                'orderId' => $orderId,
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => sprintf('%s, %s, %s, %s',
                    $data['address'],
                    $data['ward'],
                    $data['district'],
                    $data['city']
                ),
                'products' => $products,
                'total' => $total,
                'date' => now()->format('Y-m-d'),
                'deliveryStatus' => $data['payment_method'] === 'cod' ? 'Shipped' : 'Processing',
                'paymentStatus' => $data['payment_method'] === 'cod' ? 'Pending' : 'Processing',
                'note' => $data['note'] ?? ''
            ];
    
            // Handle payment

            if ($data['payment_method'] === 'momo') {
                $paymentResult = $this->momoPaymentService->createPayment([
                    'orderId' => $order['orderId'],
                    'userId' => $userId,
                    'amount' => $total
                ]);
                
                if (isset($paymentResult['resultCode']) && $paymentResult['resultCode'] === 0) {
                    //Update order with successful payment result
                    $order['paymentResult'] = $paymentResult;
                    $order['paymentStatus'] = 'Success';

                    $this->ordersCollection->updateOne(
                        ['userId' => $userId],
                        ['$push' => ['orders' => $order]],
                        ['upsert' => true]
                    );         
                    return [
                        'success' => true,
                        'orderId' => $orderId,
                        'paymentUrl' => $paymentResult['payUrl'] ?? null
                    ]; 
                }
            }
            else if($data['payment_method'] === 'cod') {
                $this->ordersCollection->updateOne(
                    ['userId' => $userId],
                    ['$push'=>['orders' => $order]],
                    ['upsert' => true]
                );

                return [
                    'success' => true,
                    'orderId' => $order['orderId']
                ];
            }
            else {
                throw new \Exception('Invalid payment method');
            }

        } catch (\Exception $e) {
            Log::error('Checkout service error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function handleMomoCallback($data)
    {
        try {
            $userId = Auth::id() ?? session()->getId();  
            $orderId = $data['orderId'];
            $resultCode = $data['resultCode'];

            $updateData = [
                'paymentStatus' => $resultCode == 0 ? 'Paid' : 'Failed',
                'paymentResult' => $data
            ];

            $updateResult = $this->ordersCollection->updateOne(
                ['userId' => $userId, 'orders.orderId' => $orderId],
                ['$set' => [
                    'orders.$.paymentStatus' => $updateData['paymentStatus'],
                    'orders.$.paymentResult' => $updateData['paymentResult']
                ]],
                ['upsert' => false]
            );

            if ($updateResult->getModifiedCount() === 0) {
                throw new \Exception("Failed to update order status for orderId: {$orderId}");
            }

            return [
                'success' => $resultCode == 0,
                'orderId' => $orderId
            ];

        } catch (\Exception $e) {
            Log::error('Momo callback error: ' . $e->getMessage());
            throw $e;
        }
    }
}