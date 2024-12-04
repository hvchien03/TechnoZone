@extends('layout.client')
@section('content')
<div class="container">
    <h1>Lịch sử đơn hàng của bạn</h1>
    
    @if(count($orders) === 0)
        <p>Chưa có đơn hàng nào.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Đơn Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái Giao Hàng</th>
                    <th>Trạng Thái Thanh Toán</th>
                    <th>Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
            
           
            </tbody>
        </table>
    @endif
</div>
@endsection
