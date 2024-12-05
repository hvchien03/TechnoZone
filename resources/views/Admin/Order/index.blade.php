@extends('layout.admin')
@section('title', 'Admin Page')
@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <!-- Breadcrumb -->
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javascript:;">Quản trị</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                            fill="currentColor" />
                    </svg>
                </li>
                <li>Danh sách đơn hàng</li>
            </ul>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Orders Table -->
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full">
                    <thead>
                        <tr class="text-left">
                            <th>Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                            <th>Thanh toán</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            @foreach($order->orders as $orderDetail)
                            <tr class="border-b border-lightgray/10 dark:border-gray/20">
                                <td>
                                    <div class="flex items-center gap-2.5">
                                        <div class="flex-1 max-w-[300px] truncate">
                                            <p class="line-clamp-1 truncate">{{ $orderDetail['name'] }}</p>
                                            <p class="text-gray">Id: #{{ $orderDetail['orderId'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $orderDetail['phone'] }}</td>
                                <td>{{ number_format($orderDetail['total']) }}đ</td>
                                <td>{{ $orderDetail['date'] }}</td>
                                <td>
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $orderDetail['deliveryStatus'] === 'Đang xử lý' ? 'bg-warning/10 text-warning' : 
                                           ($orderDetail['deliveryStatus'] === 'Đang vận chuyển' ? 'bg-primary/10 text-primary' : 'bg-success/10 text-success') }}">
                                        {{ $orderDetail['deliveryStatus'] }}
                                    </span>
                                </td>
                                <td>
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $orderDetail['paymentStatus'] === 'Đang chờ xử lý' ? 'bg-warning/10 text-warning' : 
                                           ($orderDetail['paymentStatus'] === 'Thất bại' ? 'bg-danger/10 text-danger' : 'bg-success/10 text-success') }}">
                                        {{ $orderDetail['paymentStatus'] }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('orders.show', $orderDetail['orderId']) }}" class="btn bg-primary border border-primary text-white rounded-full hover:bg-primary/85 hover:border-primary/85">
                                        Chi tiết
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
</div>
@endsection