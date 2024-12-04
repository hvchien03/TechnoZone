{{-- resources/views/admin/order/index.blade.php --}}
@extends('layout.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Order Management</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @foreach($order->orders as $orderDetail)
                        <tr style="border-bottom: 1px solid #000">
                            <td class="text-center">{{ $orderDetail['name'] }}</td>
                            <td class="text-center">{{ $orderDetail['phone'] }}</td>
                            <td class="text-right">{{ number_format($orderDetail['total']) }}đ</td>
                            <td class="text-center">{{ $orderDetail['date'] }}</td>
                            <td class="text-center">
                                <span class="p-2 badge bg-{{ $orderDetail['deliveryStatus'] === 'Processing' ? 'warning' : ($orderDetail['deliveryStatus'] === 'Shipped' ? 'primary' : 'success') }}" style="border-radius: 5px; color: white">
                                    <b>{{ $orderDetail['deliveryStatus'] }}</b>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="p-2 badge bg-{{ $orderDetail['paymentStatus'] === 'Pending' ? 'warning' : ($orderDetail['paymentStatus'] === 'Failed' ? 'danger' : 'success') }}" style="border-radius: 5px; color:white;">
                                    <b>{{ $orderDetail['paymentStatus'] }}</b>
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $orderDetail['orderId']) }}" class="btn btn-sm p-2 px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 bg-primary">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection