@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- content-wraper start -->
    <div class="content-wraper" style="margin-bottom:100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" class="cart-table">
                        <div class="table-content table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="plantmore-product-thumbnail">#</th>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="plantmore-product-price">Giá</th>
                                        <th class="plantmore-product-quantity">Số lượng</th>
                                        <th class="plantmore-product-subtotal">Tổng</th>
                                        <th class="plantmore-product-remove">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->products as $index => $item)
                                        <tr>
                                            <td class="plantmore-product-thumbnail"><a href="#"><img
                                                        src="{{ asset('images_upload/' . $products->find($item['product_id'])->image) }}"
                                                        alt="" width="100px"></a>
                                            </td>
                                            <td class="plantmore-product-name"><a
                                                    href="#">{{ $products->find($item['product_id'])->productName }}</a>
                                            </td>
                                            <td class="plantmore-product-price"><span
                                                    class="amount">{{ number_format($item['price'], 0, '.', ',') }}
                                                    VND</span></td>
                                            <td class="plantmore-product-quantity">
                                                {{ $item['quantity'] }}
                                                {{-- <form action="{{ route('cart.updateQuantity') }}" method="post">
                                                    @csrf
                                                    <input type="text" hidden name="product_id"
                                                        value="{{ $item['product_id'] }}">
                                                    <input value="{{ $item['quantity'] }}" name="quantity" min="1">
                                                    <input class="submit btn" name="update_cart" value="Cập nhật"
                                                        type="submit">
                                                </form> --}}
                                            </td>
                                            <td class="product-subtotal"><span
                                                    class="amount">{{ number_format($item['price'] * $item['quantity'], 0, '.', ',') }}
                                                    VND</span></td>
                                            <td class="plantmore-product-remove">
                                                <form action="{{ route('cart.remove') }}" method="post">
                                                    @csrf
                                                    <input type="text" hidden name="product_id"
                                                        value="{{ $item['product_id'] }}">
                                                    <button type="submit"><i class="fa fa-close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="coupon-all">

                                    <div class="coupon2">
                                        <a href="{{ route('product') }}" class="btn continue-btn">Tiếp tục mua sắm</a>
                                    </div>

                                    <div class="coupon">
                                        <h3>Mã giảm giá</h3>
                                        <p>Nhập mã giảm giá của bạn</p>
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Mã giảm giá" type="text">
                                        <input class="button" name="apply_coupon" value="Sử dụng" type="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Thành tiền</h2>
                                    <ul>
                                        <li class="text-red-600">{{ number_format($cart->total, 0, '.', ',') }} VND</li>
                                    </ul>
                                    <a href="{{ Route('index') }}" class="proceed-checkout-btn">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
@endsection
