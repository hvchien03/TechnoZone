@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
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
                                        <th class="plantmore-product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="plantmore-product-price">Unit Price</th>
                                        <th class="plantmore-product-quantity">Quantity</th>
                                        <th class="plantmore-product-subtotal">Total</th>
                                        <th class="plantmore-product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="plantmore-product-thumbnail"><a href="#"><img
                                                    src="{{ asset('assets/client/images/cart/1.jpg') }}" alt=""></a>
                                        </td>
                                        <td class="plantmore-product-name"><a href="#">Compete Track Tote</a></td>
                                        <td class="plantmore-product-price"><span class="amount">$70.00</span></td>
                                        <td class="plantmore-product-quantity">
                                            <input value="1" type="number">
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$70.00</span></td>
                                        <td class="plantmore-product-remove"><a href="#"><i
                                                    class="fa fa-close"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="plantmore-product-thumbnail"><a href="#"><img
                                                    src="{{ asset('assets/client/images/cart/2.jpg') }}" alt=""></a>
                                        </td>
                                        <td class="plantmore-product-name"><a href="#">Vestibulum suscipit</a></td>
                                        <td class="plantmore-product-price"><span class="amount">$60.50</span></td>
                                        <td class="plantmore-product-quantity">
                                            <input value="1" type="number">
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$60.50</span></td>
                                        <td class="plantmore-product-remove"><a href="#"><i
                                                    class="fa fa-close"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="plantmore-product-thumbnail"><a href="#"><img
                                                    src="{{ asset('assets/client/images/cart/3.jpg') }}" alt=""></a>
                                        </td>
                                        <td class="plantmore-product-name"><a href="#">suscip dictum magna</a></td>
                                        <td class="plantmore-product-price"><span class="amount">$40.50</span></td>
                                        <td class="plantmore-product-quantity">
                                            <input value="1" type="number">
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$40.50</span></td>
                                        <td class="plantmore-product-remove"><a href="#"><i
                                                    class="fa fa-close"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="coupon-all">

                                    <div class="coupon2">
                                        <input class="submit btn" name="update_cart" value="Update cart" type="submit">
                                        <a href="shop.html" class="btn continue-btn">Continue Shopping</a>
                                    </div>

                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span>$170.00</span></li>
                                        <li>Total <span>$170.00</span></li>
                                    </ul>
                                    <a href="{{ Route('checkout') }}" class="proceed-checkout-btn">Proceed to checkout</a>
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
