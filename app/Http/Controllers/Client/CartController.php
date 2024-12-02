<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cart = Cart::where('user_id', Auth::id())->first();
        return view('client.cart.index', compact('cart', 'products'));
    }
    public function add(Request $request)
    {
        $pro = Product::find($request->product_id);
        $product = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $pro->price
        ];
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cart->addToCart($product);
        return redirect()->route('cart');
    }
    //kiểm tra funtion remove và removeFromCart trong model
    public function remove(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->removeFromCart($request->product_id);
        return redirect()->route('cart');
    }
    public function updateQuantity(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cart->updateQuantity($request->product_id, $request->quantity);
        return redirect()->route('cart');
    }
    public function checkout()
    {
        return view('client.cart.checkout');
    }
}
