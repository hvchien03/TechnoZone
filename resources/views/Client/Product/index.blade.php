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
                                <span>Hiển thị 10 sản phẩm</span>
                            </div>
                        </div>

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
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalProductId-{{ $item->_id }}"><i
                                                                    class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a
                                                                href="{{ route('product.show', $item->_id) }}">{{ $item->productName }}</a>
                                                        </h3>
                                                        <div class="price-box">
                                                            <span
                                                                class="new-price">{{ number_format($item->price, 0, ',', '.') }}
                                                                VND</span>
                                                            <span
                                                                class="old-price">{{ number_format($item->price, 0, ',', '.') }}
                                                                VND</span>
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

                                            <div class="modal fade modal-wrapper"
                                                id="exampleModalProductId-{{ $item->_id }}">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <div class="modal-inner-area row single-product-area">
                                                                <div class="col-lg-5 col-md-6">
                                                                    <!-- Product Details Left -->
                                                                    <div class="product-details-left">
                                                                        <div
                                                                            class="product-details-images slider-lg-image-1">
                                                                            <div class="lg-image">
                                                                                <a href="{{ asset('images_upload/' . $item->image) }}"
                                                                                    class="img-poppu"><img
                                                                                        src="{{ asset('images_upload/' . $item->image) }}"
                                                                                        alt="product image"></a>
                                                                            </div>
                                                                            <div class="lg-image">
                                                                                <a href="{{ asset('images_upload/' . $item->image) }}"
                                                                                    class="img-poppu"><img
                                                                                        src="{{ asset('images_upload/' . $item->image) }}"
                                                                                        alt="product image"></a>
                                                                            </div>
                                                                            <div class="lg-image">
                                                                                <a href="{{ asset('images_upload/' . $item->image) }}"
                                                                                    class="img-poppu"><img
                                                                                        src="{{ asset('images_upload/' . $item->image) }}"
                                                                                        alt="product image"></a>
                                                                            </div>
                                                                            <div class="lg-image">
                                                                                <a href="{{ asset('images_upload/' . $item->image) }}"
                                                                                    class="img-poppu"><img
                                                                                        src="{{ asset('images_upload/' . $item->image) }}"
                                                                                        alt="product image"></a>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="product-details-thumbs slider-thumbs-1">
                                                                            <div class="sm-image"><img
                                                                                    src="{{ asset('images_upload/' . $item->image) }}"
                                                                                    alt="product image thumb"></div>
                                                                            <div class="sm-image"><img
                                                                                    src="{{ asset('images_upload/' . $item->image) }}"
                                                                                    alt="product image thumb"></div>
                                                                            <div class="sm-image"><img
                                                                                    src="{{ asset('images_upload/' . $item->image) }}"
                                                                                    alt="product image thumb"></div>
                                                                            <div class="sm-image"><img
                                                                                    src="{{ asset('images_upload/' . $item->image) }}"
                                                                                    alt="product image thumb"></div>
                                                                        </div>
                                                                    </div>
                                                                    <!--// Product Details Left -->
                                                                </div>

                                                                <div class="col-lg-7 col-md-6">
                                                                    <div class="product-details-view-content">
                                                                        <div class="product-info">
                                                                            <h2>{{ $item->productName }}</h2>
                                                                            <div class="price-box">
                                                                                <span
                                                                                    class="old-price">{{ number_format($item->price, 0, ',', '.') }}
                                                                                    VND</span>
                                                                                <span
                                                                                    class="new-price">{{ number_format($item->price, 0, ',', '.') }}
                                                                                    VND</span>
                                                                                <span
                                                                                    class="discount discount-percentage">Tiết
                                                                                    kiệm 0%</span>
                                                                            </div>
                                                                            {{-- <div class="single-add-to-cart">
                                                                                <form action="{{ route('cart.add') }}"
                                                                                    method="post" class="cart-quantity">
                                                                                    @csrf
                                                                                    <input type="text" hidden
                                                                                        name="product_id"
                                                                                        value="{{ $item->_id }}">
                                                                                    <div class="quantity">
                                                                                        <label>Số lượng</label>
                                                                                        <div class="cart-plus-minus">
                                                                                            <input
                                                                                                class="cart-plus-minus-box"
                                                                                                min="1"
                                                                                                name="quantity"
                                                                                                value="1"
                                                                                                type="text">
                                                                                            <div class="dec qtybutton"><i
                                                                                                    class="fa fa-angle-down"></i>
                                                                                            </div>
                                                                                            <div class="inc qtybutton"><i
                                                                                                    class="fa fa-angle-up"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <button class="add-to-cart"
                                                                                        type="submit">Thêm vào giỏ
                                                                                        hàng</button>
                                                                                </form>
                                                                            </div> --}}
                                                                            <div class="product-availability">
                                                                                <i class="fa fa-check"></i> Còn hàng
                                                                            </div>
                                                                            <div class="block-reassurance">
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="reassurance-item">
                                                                                            <div class="reassurance-icon">
                                                                                                <i
                                                                                                    class="fa fa-check-square-o"></i>
                                                                                            </div>
                                                                                            <p>{{ $item->warrantyPolicy }}
                                                                                            </p>
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
                                                                                                <i
                                                                                                    class="fa fa-exchange"></i>
                                                                                            </div>
                                                                                            <p>Đổi trả trong vòng
                                                                                                {{ $item->warrantyPeriod }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- <div id="list-view" class="tab-pane">
                                <div class="row single-product-area">
                                    @foreach ($products as $item)
                                        <div class="col-lg-5 col-md-6">
                                            <!-- Product Details Left -->
                                            <div class="product-details-left">
                                                <div class="product-details-images slider-lg-image-1">
                                                    <div class="lg-image">
                                                        <a href="{{ asset('images_upload/' . $item->image) }}"
                                                            class="img-poppu"><img
                                                                src="{{ asset('images_upload/' . $item->image) }}"
                                                                alt="product image"></a>
                                                    </div>
                                                    <div class="lg-image">
                                                        <a href="{{ asset('images_upload/' . $item->image) }}"
                                                            class="img-poppu"><img
                                                                src="{{ asset('images_upload/' . $item->image) }}"
                                                                alt="product image"></a>
                                                    </div>
                                                    <div class="lg-image">
                                                        <a href="{{ asset('images_upload/' . $item->image) }}"
                                                            class="img-poppu"><img
                                                                src="{{ asset('images_upload/' . $item->image) }}"
                                                                alt="product image"></a>
                                                    </div>
                                                    <div class="lg-image">
                                                        <a href="{{ asset('images_upload/' . $item->image) }}"
                                                            class="img-poppu"><img
                                                                src="{{ asset('images_upload/' . $item->image) }}"
                                                                alt="product image"></a>
                                                    </div>
                                                </div>
                                                <div class="product-details-thumbs slider-thumbs-1">
                                                    <div class="sm-image"><img
                                                            src="{{ asset('images_upload/' . $item->image) }}"
                                                            alt="product image thumb"></div>
                                                    <div class="sm-image"><img
                                                            src="{{ asset('images_upload/' . $item->image) }}"
                                                            alt="product image thumb"></div>
                                                    <div class="sm-image"><img
                                                            src="{{ asset('images_upload/' . $item->image) }}"
                                                            alt="product image thumb"></div>
                                                    <div class="sm-image"><img
                                                            src="{{ asset('images_upload/' . $item->image) }}"
                                                            alt="product image thumb"></div>
                                                </div>
                                            </div>
                                            <!--// Product Details Left -->
                                        </div>

                                        <div class="col-lg-7 col-md-6">
                                            <div class="product-details-view-content">
                                                <div class="product-info">
                                                    <h2>{{ $item->productName }}</h2>
                                                    <div class="price-box">
                                                        <span
                                                            class="old-price">{{ number_format($item->price, 0, ',', '.') }}
                                                            VND</span>
                                                        <span
                                                            class="new-price">{{ number_format($item->price, 0, ',', '.') }}
                                                            VND</span>
                                                        <span class="discount discount-percentage">Tiết
                                                            kiệm 0%</span>
                                                    </div>
                                                    <div class="single-add-to-cart">
                                                        <form action="{{ route('cart.add') }}" method="post"
                                                            class="cart-quantity">
                                                            @csrf
                                                            <input type="text" hidden name="product_id"
                                                                value="{{ $item->_id }}">
                                                            <div class="quantity">
                                                                <label>Số lượng</label>
                                                                <div class="cart-plus-minus">
                                                                    <input class="cart-plus-minus-box" min="1"
                                                                        name="quantity" value="1" type="text">
                                                                    <div class="dec qtybutton"><i
                                                                            class="fa fa-angle-down"></i>
                                                                    </div>
                                                                    <div class="inc qtybutton"><i
                                                                            class="fa fa-angle-up"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="add-to-cart" type="submit">Thêm vào giỏ
                                                                hàng</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}
                            <style>
                                .pagination {
                                    display: flex;
                                    /* justify-content: end; */
                                    margin-top: 20px;
                                    margin-right: 30px;
                                }

                                .pagination .pages {
                                    display: flex;
                                }

                                .pagination .item {
                                    margin: 0 5px;
                                }

                                .page-link {
                                    padding: 8px 15px;
                                    background-color: #f0f0f0;
                                    border: 1px solid #ddd;
                                    color: #333;
                                    text-decoration: none;
                                    font-size: 14px;
                                    transition: background-color 0.3s, color 0.3s;
                                    display: inline-block;
                                    text-align: center;
                                }

                                .page-link:hover {
                                    background-color: #007bff;
                                    color: #fff;
                                }

                                .page-item.active .page-link {
                                    background-color: #007bff;
                                    color: white;
                                    pointer-events: none;
                                }
                            </style>
                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        {{-- <p>Showing 1-12 of 13 item(s)</p> --}}
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <div class="pagination">
                                                {{-- Previous Page Link --}}
                                                <div class="previous">
                                                    @if ($products->onFirstPage())
                                                        <button class="page-link" disabled>« Trở về</button>
                                                    @else
                                                        <a href="{{ $products->previousPageUrl() }}"
                                                            class="page-link">&laquo;
                                                            Trở về</a>
                                                    @endif
                                                </div>

                                                {{-- Pagination Elements --}}
                                                <div class="pages d-flex flex-fill">
                                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                                        <div
                                                            class="{{ $products->currentPage() == $page ? 'active' : '' }} item">
                                                            <a href="{{ $url }}"
                                                                class="page-link">{{ $page }}</a>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                {{-- Next Page Link --}}
                                                <div class="next float-end">
                                                    @if ($products->hasMorePages())
                                                        <a href="{{ $products->nextPageUrl() }}" class="page-link">Tiếp
                                                            &raquo;</a>
                                                    @else
                                                        <button class="page-link" disabled>Tiếp &raquo;</button>
                                                    @endif
                                                </div>
                                            </div>
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
