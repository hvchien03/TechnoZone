<!-- resources/views/client/orders/show.blade.php -->
@extends('layout.client')
@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h3>Chi tiết đơn hàng #{{ $order['orders']['orderId'] }}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Thông tin giao hàng</h5>
                    <p><strong>Người nhận:</strong> {{ $order['orders']['name'] }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order['orders']['phone'] }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $order['orders']['address'] }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Thông tin đơn hàng</h5>
                    <p><strong>Ngày đặt:</strong> {{ $order['orders']['date'] }}</p>
                    <p><strong>Trạng thái:</strong> 
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                                            {{ $order['orders']['deliveryStatus'] === 'Đang xử lý' ? 'bg-warning/10 text-warning' : 
                                            ($order['orders']['deliveryStatus'] === 'Đang vận chuyển' ? 'bg-primary/10 text-primary' : 'bg-success/10 text-success') }}">
                                            {{ $order['orders']['deliveryStatus'] }}
                        </span>
                    </p>
                    <p><strong>Thanh toán:</strong>
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                                            {{ $order['orders']['paymentStatus'] === 'Đang xử lý' ? 'bg-warning/10 text-warning' : 
                                            ($order['orders']['paymentStatus'] === 'Đang chờ xử lý' ? 'bg-primary/10 text-primary' : 'bg-success/10 text-success') }}">
                                            {{ $order['orders']['paymentStatus'] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="card">
                <h5 class="p-2">Sản phẩm</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order['orders']['products'] as $product)
                            <tr>
                                <td>{{ $products[$product['product_id']]->productName ?? 'Unknown Product' }}</td>
                                <td>{{ $product['quantity'] }}</td>
                                <td>{{ number_format($product['price']) }}đ</td>
                                <td>{{ number_format($product['price'] * $product['quantity']) }}đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                                <td><strong>{{ number_format($order['orders']['total']) }}đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection