@extends('layout.client')

@section('content')
<div class="container mt-4">
    <h1>Chi Tiết Đơn Hàng</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Thông Tin Đơn Hàng</h5>
        </div>
        <div class="card-body">
            <p><strong>ID Đơn Hàng:</strong> {{ $order['orderId'] }}</p>
            <p><strong>Tên:</strong> {{ $order['name'] }}</p>
            <p><strong>Số Điện Thoại:</strong> {{ $order['phone'] }}</p>
            <p><strong>Địa Chỉ:</strong> {{ $order['address'] }}</p>
            <p><strong>Ngày Đặt Hàng:</strong> {{ $order['date'] }}</p>
            <p><strong>Tổng Tiền:</strong> {{ number_format($order['total']) }}đ</p>
            <p><strong>Trạng Thái Giao Hàng:</strong>
                <span class="badge bg-{{ $order['deliveryStatus'] === 'Processing' ? 'warning' : ($order['deliveryStatus'] === 'Shipped' ? 'info' : 'success') }}">
                    {{ $order['deliveryStatus'] }}
                </span>
            </p>
            <p><strong>Trạng Thái Thanh Toán:</strong>
                <span class="badge bg-{{ $order['paymentStatus'] === 'Pending' ? 'warning' : ($order['paymentStatus'] === 'Failed' ? 'danger' : 'success') }}">
                    {{ $order['paymentStatus'] }}
                </span>
            </p>

        </div>
    </div>

    <h3>Danh Sách Sản Phẩm</h3>
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>ID Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Thành Tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order['products'] as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product['product_id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td style="text-align: center; vertical-align: middle;">
                    @if(!empty($product['image']) && file_exists(public_path('images_upload/' . $product['image'])))
                        <img src="{{ asset('images_upload/' . $product['image']) }}" alt="{{ $product['name'] }}" style="width: 70px; height: 70px; object-fit: cover;">
                    @else
                        <span>Không có hình ảnh</span>
                    @endif
                </td>
                <td>{{ $product['quantity'] }}</td>
                <td style="text-align: right;">{{ number_format($product['price']) }}đ</td>
                <td style="text-align: right;">{{ number_format($product['quantity'] * $product['price']) }}đ</td>
            </tr>
        @endforeach
    </tbody>
</table>


    <a style="margin: 30px;" href="{{ route('orderhistory.index') }}" class="btn btn-primary mt-3">
        <i class="fas fa-arrow-left"></i> Quay Lại
    </a>
</div>
@endsection
