<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Order;
use MongoDB\BSON\ObjectId;
use App\Models\User;

class ServiceController extends Controller
{
    public function index()
    {
        $requests = RequestModel::all();
        return view('admin.service.index', compact('requests'));
    }
    public function details($id)
    {
        $request = RequestModel::find($id);
        return view('admin.service.details', compact('request'));
    }
    public function create()
    {
        return view('admin.service.create');
    }
    public function store(Request $request)
    {
        $userId = new ObjectId($request->customerId);
        $customer_orders = Order::where('userId', $userId)->first();
        $order = collect($customer_orders->orders)->firstWhere('orderId', $request->orderId);
        try {
            $newRequest = new RequestModel();
            $newRequest->userId = $userId;
            $newRequest->orders = [
                'orderId' => $order['orderId'],
                'name' => $order['name'],
                'phone' => $order['phone'],
                'address' => $order['address'],
                'products' => $order['products'],
                'total' => $order['total'],
                'date' => $order['date'],
                'deliveryStatus' => $order['deliveryStatus'],
                'paymentStatus' => $order['paymentStatus'],
            ];
            $newRequest->requestDetails = [
                'type' => $request->serviceType,
                'reason' => $request->reason,
                'requestedDate' => now(),
                'actions' => [],
                'status' => 'Đang xử lý',
                'notes' => $request->notes,
            ];
            $newRequest->save();
            return redirect()->route('admin.service.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
    public function update(Request $request)
    {
        $credentials = $request->validate([
            'status' => 'required',
            'note' => 'nullable'
        ]);
        $request = RequestModel::find($request->request_id);

        $request->updateStatus($credentials['status'], $credentials['note']);

        return redirect()->route('admin.service.index');
    }
}
