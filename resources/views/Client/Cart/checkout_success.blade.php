@extends('layout.client')

@section('content')
<div class="container py-5">
    <div class="text-center">
        <i class="bi bi-check-circle-fill text-success" style="font-size: 64px;"></i>
        <h2 class="mt-4">Đặt hàng thành công!</h2>
        <p>Mã đơn hàng của bạn là: #{{ $orderId }}</p>
        <p>Chúng tôi sẽ sớm liên hệ với bạn để xác nhận đơn hàng.</p>
        <div class="mt-4">
            <a href="{{ route('home') }}" class="btn btn-primary">Về trang chủ</a>
        </div>
    </div>
</div>
@endsection