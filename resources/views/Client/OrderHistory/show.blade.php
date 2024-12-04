@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{ $product->productName }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-lg-image-1">
                            <div class="lg-image">
                                <a href="{{ asset('images_upload/' . $product->image) }}" class="img-poppu"><img
                                        src="{{ asset('images_upload/' . $product->image) }}" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="{{ asset('images_upload/' . $product->image) }}" class="img-poppu"><img
                                        src="{{ asset('images_upload/' . $product->image) }}" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="{{ asset('images_upload/' . $product->image) }}" class="img-poppu"><img
                                        src="{{ asset('images_upload/' . $product->image) }}" alt="product image"></a>
                            </div>
                            <div class="lg-image">
                                <a href="{{ asset('images_upload/' . $product->image) }}" class="img-poppu"><img
                                        src="{{ asset('images_upload/' . $product->image) }}" alt="product image"></a>
                            </div>
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="{{ asset('images_upload/' . $product->image) }}"
                                    alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('images_upload/' . $product->image) }}"
                                    alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('images_upload/' . $product->image) }}"
                                    alt="product image thumb"></div>
                            <div class="sm-image"><img src="{{ asset('images_upload/' . $product->image) }}"
                                    alt="product image thumb"></div>
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content">
                        <div class="product-info">
                            <h2>{{ $product->productName }}</h2>
                            <div class="price-box">
                                <span class="old-price">{{ number_format($product->price, 0, ',', '.') }} VND</span>
                                <span class="new-price">{{ number_format($product->price, 0, ',', '.') }} VND</span>
                                <span class="discount discount-percentage">Tiết kiệm 0%</span>
                            </div>
                            <div class="single-add-to-cart">
                                <form action="{{ route('cart.add') }}" method="post" class="cart-quantity">
                                    @csrf
                                    <input type="text" hidden name="product_id" value="{{ $product->_id }}">
                                    <div class="quantity">
                                        <label>Số lượng</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" min="1" name="quantity" value="1"
                                                type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                            <div class="product-availability">
                                <i class="fa fa-check"></i> Còn hàng
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>{{ $product->warrantyPolicy }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Giao hàng hoả tốc</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p>Đổi trả trong vòng {{ $product->warrantyPeriod }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-details-tab mt--60">
                        <ul role="tablist" class="mb--50 nav">
                            <li class="active" role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#description" class="active">Mô tả</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#sheet">Cấu hình</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product_details_tab_content tab-content">
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                            <div class="product_description_wrap">
                                <div class="product_desc mb--30">
                                    <h2 class="title_3">Mô tả</h2>
                                    <p>{{ $product->configuration }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="sheet" role="tabpanel">
                            <div class="pro_feature">
                                <h2 class="title_3">Cấu hình</h2>
                                <ul class="feature_list">
                                    <li><a href="#"><i class="fa fa-play"></i>Duis aute irure dolor in reprehenderit
                                            in voluptate velit esse</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Irure dolor in reprehenderit in
                                            voluptate velit esse</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Irure dolor in reprehenderit in
                                            voluptate velit esse</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Sed do eiusmod tempor incididunt ut
                                            labore et </a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Sed do eiusmod tempor incididunt ut
                                            labore et </a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Nisi ut aliquip ex ea commodo
                                            consequat.</a></li>
                                    <li><a href="#"><i class="fa fa-play"></i>Nisi ut aliquip ex ea commodo
                                            consequat.</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->


    <!-- Product Area Start -->
    <div class="product-area section-pt" style="margin-bottom:100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title start -->
                    <div class="section-title section-bg-2">
                        <h2>Hàng mới</h2>
                        <p>Nâng cấp Mac, nâng cao trải nghiệm.</p>
                    </div>
                    <!-- section-title end -->
                </div>
            </div>
            <!-- product-wrapper start -->
            <div class="product-wrapper">
                <div class="row product-slider">
                    @foreach ($listProduct as $pro)
                        <div class="col-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{ route('product.show', $pro->_id) }}"><img
                                            src="{{ asset('images_upload/' . $pro->image) }}" alt=""></a>
                                    <span class="label-product label-new">Mới</span>
                                    <span class="label-product label-sale">-0%</span>
                                    <div class="quick_view">
                                        <a href="#" title="quick view" class="quick-view-btn"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i
                                                class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ route('product.show', $product->_id) }}">{{ $pro->productName }}</a>
                                    </h3>
                                    <div class="price-box">
                                        <span class="new-price">{{ number_format($pro->price, 0, ',', '.') }} VND</span>
                                        <span class="old-price">{{ number_format($pro->price, 0, ',', '.') }} VND</span>
                                    </div>
                                    <div class="product-action">
                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to
                                            cart</button>
                                        <div class="star_content">
                                            <ul class="d-flex">
                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- product-wrapper end -->
        </div>
    </div>
    <!-- Product Area End -->
@endsection
