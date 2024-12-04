@extends('layout.client')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lịch sử đơn hàng của bạn</h1>

    @if(count($orders) === 0)
        <h3>Chưa có đơn hàng nào.</h3>
    @else
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID Đơn Hàng</th>
                    <th>Tên</th>
                    <th>Ngày Đặt</th>
                    <th style="text-align: right;">Tổng Tiền</th>
                    <th style="text-align: center;">Trạng Thái Giao Hàng</th>
                    <th style="text-align: center;">Trạng Thái Thanh Toán</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    @foreach($order->orders as $orderDetail)
                        <tr>
                            <td>{{ $orderDetail['orderId'] }}</td>
                            <td>{{ $orderDetail['name'] }}</td>
                            <td>{{ $orderDetail['date'] }}</td>
                            <td style="text-align: right;">{{ number_format($orderDetail['total']) }}đ</td>
                            <td style="text-align: center;">
                                <span class="badge bg-{{ $orderDetail['deliveryStatus'] === 'Processing' ? 'warning' : ($orderDetail['deliveryStatus'] === 'Shipped' ? 'info' : 'success') }}">
                                    {{ $orderDetail['deliveryStatus'] }}
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <span class="badge bg-{{ $orderDetail['paymentStatus'] === 'Pending' ? 'warning' : ($orderDetail['paymentStatus'] === 'Failed' ? 'danger' : 'success') }}">
                                    {{ $orderDetail['paymentStatus'] }}
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ route('orderhistory.show', $orderDetail['orderId']) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
