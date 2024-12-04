<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Services\CheckoutService;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    protected $checkoutService;
    protected $cartService;

    public function __construct(CheckoutService $checkoutService, CartService $cartService)
    {
        $this->checkoutService = $checkoutService;
        $this->cartService = $cartService;
    }

    public function index()
    {
        try {
            $cartItems = $this->cartService->getContent();
            
            if (empty($cartItems)) {
                return redirect()->route('cart')->with('error', 'Giỏ hàng trống');
            }

            $cartTotal = collect($cartItems)->sum('subtotal');
            $shipping = 30000; // Fixed shipping fee

            return view('client.cart.checkout', compact('cartItems', 'cartTotal', 'shipping'));
        } catch (\Exception $e) {
            Log::error('Checkout index error: ' . $e->getMessage());
            return redirect()->route('checkout')->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    public function process(CheckoutRequest $request)
    {
        try {
            $result = $this->checkoutService->processCheckout($request->validated());

            if ($request->input('payment_method') === 'momo') {
                return response()->json([
                    'payUrl' => $result['paymentUrl']
                ]);
            }

            // Clear cart after successful order
            $this->cartService->clear();
            
            return redirect()->route('success')
                           ->with('orderId', $result['orderId'])
                           ->with('success', 'Đặt hàng thành công!');

        } catch (\Exception $e) {
            Log::error('Checkout process error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }

    public function createMomoPayment(CheckoutRequest $request)
    {
        try {
            $result = $this->checkoutService->processCheckout($request->validated());

            if (!isset($result['paymentUrl'])) {
                throw new \Exception('PaymentUrl không tồn tại trong kết quả thanh toán');
            }
            
            return response()->json([
                'payUrl' => $result['paymentUrl']
            ]);
        } catch (\Exception $e) {
            Log::error('Create MoMo payment error: ' . $e->getMessage());
            return response()->json(['error' => 'Có lỗi xảy ra, vui lòng thử lại!'], 500);
        }
    }

    public function success()
    {
        $orderId = session('orderId');
        if (!$orderId) {
            return redirect()->route('cart');
        }
        return view('client.cart.checkout_success', compact('orderId'));
    }

    public function momoCallback(Request $request)
    {
        try {
            $result = $this->checkoutService->handleMomoCallback($request->all());
            
            if ($result['success']) {
                $this->cartService->clear();
                return redirect()->route('success')
                               ->with('orderId', $result['orderId']);
            }
            
            return redirect()->route('index')
                           ->with('error', 'Thanh toán thất bại!');
        } catch (\Exception $e) {
            Log::error('Momo callback error: ' . $e->getMessage());
            return redirect()->route('checkout')
                           ->with('error', 'Có lỗi xảy ra trong quá trình thanh toán!');
        }
    }
}