@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                <div class="col-lg-12">
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active"><a class="active" data-bs-toggle="tab" href="#grid-view"><i
                                                class="fa fa-th"></i></a></li>
                                    <li><a data-bs-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Hiển thị 9 sản phẩm</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sắp xếp theo:</p>
                                <select class="nice-select">
                                    <option value="trending">Chọn</option>
                                    <option value="sales">Tên (A - Z)</option>
                                    <option value="sales">Tên (Z - A)</option>
                                    <option value="rating">Giá (Thấp &gt; Cao)</option>
                                    <option value="date">Giá (Cao &gt; Thấp)</option>
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->

                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane active">
                                <div class="shop-product-area">
                                    <div class="row">
                                        @foreach ($products as $item)

                                        <div class="col-lg-3 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="{{ route('product.show', $item->_id) }}"><img
                                                            src="{{ asset('images_upload/' . $item->image) }}"
                                                            alt=""></a>
                                                    <span class="label-product label-new">Mới</span>
                                                    <span class="label-product label-sale">-0%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i
                                                                class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="{{ route('product.show', $item->_id) }}">{{ $item->productName }}</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($item->price, 0, ',', '.') }} VND</span>
                                                        <span class="old-price">{{ number_format($item->price, 0, ',', '.') }} VND</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i
                                                                class="fa fa-plus"></i>Thêm vô túi</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i
                                                                            class="fa fa-star-o"></i></a></li>
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
                            </div>
                            <div id="list-view" class="tab-pane">
                                <div class="row">
                                    <div class="col">
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href=""><img
                                                                src="{{ asset('assets/client/images/product/5.jpg') }}"
                                                                alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter"><i
                                                                    class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="">New Printed Summer</a>
                                                        </h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i
                                                                            class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$55.27</span>
                                                            <span class="old-price">$58.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i
                                                                class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy
                                                            material for a comfortable fit. Accessorize with a straw hat and
                                                            you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href=""><img
                                                                src="{{ asset('assets/client/images/product/4.jpg') }}"
                                                                alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter"><i
                                                                    class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="">Summer Printed </a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i
                                                                            class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$51.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i
                                                                class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy
                                                            material for a comfortable fit. Accessorize with a straw hat and
                                                            you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href=""><img
                                                                src="{{ asset('assets/client/images/product/8.jpg') }}"
                                                                alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter"><i
                                                                    class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="">New product Summer</a>
                                                        </h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i
                                                                            class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$41.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i
                                                                class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy
                                                            material for a comfortable fit. Accessorize with a straw hat and
                                                            you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href=""><img
                                                                src="{{ asset('assets/client/images/product/6.jpg') }}"
                                                                alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter"><i
                                                                    class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="">Printed Summer</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i
                                                                            class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$41.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i
                                                                class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy
                                                            material for a comfortable fit. Accessorize with a straw hat and
                                                            you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href=""><img
                                                                src="{{ asset('assets/client/images/product/2.jpg') }}"
                                                                alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter"><i
                                                                    class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="">Printed Summer</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i
                                                                            class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i
                                                                            class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$31.27</span>
                                                            <span class="old-price">$44.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i
                                                                class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy
                                                            material for a comfortable fit. Accessorize with a straw hat and
                                                            you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Showing 1-12 of 13 item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i>
                                                    Previous</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                                <a href="#" class="Next"> Next <i
                                                        class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
@endsection
