@extends('layout.client')
@section('title', 'Cart')
@section('content')
    <div class="row justify-content-around my-5">
        <h3 class="text-center py-3">
            Giỏ hàng trống !!!</h3>
        <a href="{{ route('product') }}" class="text-decoration-none text-white btn btn-dark" style="width: 200px;">Tiếp tục
            mua hàng</a>
    </div>
@endsection
