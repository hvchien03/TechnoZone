@extends('layout.admin')
@section('title', 'Chi tiết đơn hàng')
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
                <li>Chi tiết đơn hàng #{{ $orderDetail['orderId'] }}</li>
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

    <!-- Order Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <!-- Customer Information -->
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h6 class="text-lg font-semibold mb-4">Thông tin khách hàng</h6>
            <div class="space-y-3">
                <div class="flex items-center">
                    <i class="bi bi-person-fill me-2"></i>
                    <span class="font-medium">Tên:</span>
                    <span class="ml-2">{{ $orderDetail['name'] }}</span>
                </div>
                <div class="flex items-center">
                    <i class="bi bi-telephone-fill me-2"></i>
                    <span class="font-medium">Số điện thoại:</span>
                    <span class="ml-2">{{ $orderDetail['phone'] }}</span>
                </div>
                <div class="flex items-center">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    <span class="font-medium">Địa chỉ:</span>
                    <span class="ml-2">{{ $orderDetail['address'] }}</span>
                </div>
            </div>
        </div>

        <!-- Order Information -->
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h6 class="text-lg font-semibold mb-4">Thông tin đơn hàng</h6>
            <div class="space-y-3">
                <div class="flex items-center">
                    <i class="bi bi-calendar-fill me-2"></i>
                    <span class="font-medium">Ngày đặt:</span>
                    <span class="ml-2">{{ $orderDetail['date'] }}</span>
                </div>
                <div class="flex items-center">
                    <i class="bi bi-cash me-2"></i>
                    <span class="font-medium">Tổng tiền:</span>
                    <span class="ml-2">{{ number_format($orderDetail['total']) }}đ</span>
                </div>
                <div class="flex items-center">
                    <i class="bi bi-sticky-fill me-2"></i>
                    <span class="font-medium">Ghi chú:</span>
                    <span class="ml-2">{{ $orderDetail['note'] ?: 'Không có' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Update -->
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
        <h6 class="text-lg font-semibold mb-4">Cập nhật trạng thái</h6>
        <form action="{{route('orders.updateStatus', $orderDetail['orderId'])}}" method="POST" class="flex gap-4 items-center">
            @csrf
            <select name="deliveryStatus" class="form-select rounded-lg border-gray-300 dark:border-gray-600">
                <option value="Đang xử lý" {{ $orderDetail['deliveryStatus'] === 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="Đang vận chuyển" {{ $orderDetail['deliveryStatus'] === 'Đang vận chuyển' ? 'selected' : '' }}>Đang vận chuyển</option>
                <option value="Đã giao hàng" {{ $orderDetail['deliveryStatus'] === 'Đã giao hàng' ? 'selected' : '' }}>Đã giao hàng</option>
                <option value="Đã hủy" {{ $orderDetail['deliveryStatus'] === 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
            </select>
            <button type="submit" class="btn bg-primary border border-primary text-white rounded-lg hover:bg-primary/85">
                <i class="bi bi-arrow-clockwise me-2"></i>Cập nhật
            </button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
        <h6 class="text-lg font-semibold mb-4">Chi tiết sản phẩm</h6>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tên SP
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Số lượng
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Đơn giá
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Thành tiền
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($orderDetail['products'] as $product)
                    @php
                        $productDetails = \App\Models\Product::find($product['product_id']);
                    @endphp
                    <tr>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $productDetails->productName }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $product['quantity'] }}</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ number_format($product['price']) }}đ</td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ number_format($product['quantity'] * $product['price']) }}đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Payment Information -->
    @if(isset($orderDetail->paymentResult))
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
        <h6 class="text-lg font-semibold mb-4">Thông tin thanh toán</h6>
        <div class="space-y-3">
            <div class="flex items-center">
                <i class="bi bi-info-circle-fill me-2"></i>
                <span class="font-medium">Trạng thái:</span>
                <span class="ml-2">{{ $orderDetail->paymentResult->message }}</span>
            </div>
            <div class="flex items-center">
                <i class="bi bi-hash me-2"></i>
                <span class="font-medium">Mã giao dịch:</span>
                <span class="ml-2">{{ $orderDetail->paymentResult->requestId }}</span>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection