{{-- resources/views/admin/order/show.blade.php --}}
@extends('layout.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Order Details</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Đơn hàng #{{ $orderDetail['orderId'] }}</h5>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3 text-primary">Thông tin khách hàng</h6>
                            <div class="mb-2"><i class="fas fa-user me-2"></i><strong>Tên:</strong> {{ $orderDetail['name'] }}</div>
                            <div class="mb-2"><i class="fas fa-phone me-2"></i><strong>Số điện thoại:</strong> {{ $orderDetail['phone'] }}</div>
                            <div class="mb-2"><i class="fas fa-map-marker-alt me-2"></i><strong>Địa chỉ:</strong> {{ $orderDetail['address'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3 text-primary">Thông tin đơn hàng</h6>
                            <div class="mb-2"><i class="fas fa-calendar me-2"></i><strong>Ngày đặt:</strong> {{ $orderDetail['date'] }}</div>
                            <div class="mb-2"><i class="fas fa-money-bill me-2"></i><strong>Tổng tiền:</strong> {{ number_format($orderDetail['total']) }}đ</div>
                            <div class="mb-2"><i class="fas fa-sticky-note me-2"></i><strong>Ghi chú:</strong> {{ $orderDetail['note'] ?: 'Không có' }}</div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3 text-primary">Cập nhật trạng thái</h6>
                            <form action="#" method="POST" class="d-flex gap-2 align-items-center">
                                @csrf
                                <select name="status" class="form-select w-auto">
                                    <option value="Processing" {{ $orderDetail['deliveryStatus'] === 'Processing' ? 'selected' : '' }}>Đang xử lý</option>
                                    <option value="Shipped" {{ $orderDetail['deliveryStatus'] === 'Shipped' ? 'selected' : '' }}>Đang giao hàng</option>
                                    <option value="Delivered" {{ $orderDetail['deliveryStatus'] === 'Delivered' ? 'selected' : '' }}>Đã giao hàng</option>
                                </select>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt me-2"></i>Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="card">
                <div class="card-body">/-strong/-heart:>:o:-((:-h <h6 class="card-subtitle mb-3 text-primary">Chi tiết sản phẩm</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Mã SP</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-end">Đơn giá</th>
                                    <th class="text-end">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderDetail['products'] as $product)
                                <tr>
                                    <td class="text-center">{{ $product['productId'] }}</td>
                                    <td class="text-center">{{ $product['quantity'] }}</td>
                                    <td class="text-end">{{ number_format($product['price']) }}đ</td>
                                    <td class="text-end">{{ number_format($product['quantity'] * $product['price']) }}đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
            @if(isset($orderDetail->paymentResult))
            <div class="card mt-4">
                <div class="card-body">
                    <h6 class="card-subtitle mb-3 text-primary">Thông tin thanh toán</h6>
                    <div class="mb-2"><i class="fas fa-info-circle me-2"></i><strong>Trạng thái:</strong> {{ $orderDetail->paymentResult->message }}</div>
                    <div class="mb-2"><i class="fas fa-hashtag me-2"></i><strong>Mã giao dịch:</strong> {{ $orderDetail->paymentResult->requestId }}</div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection