@extends('layout.client')
@section('content')
    <!-- Hero Slider start -->
    <div class="hero-slider hero-slider-one">
        <div class="single-slide"
            style="background-image: url({{ asset('assets/client/images/slider/0768eeb44a48bb84e7dcb54910870036.png') }})">
            {{-- <!-- Hero Content One Start -->
            <div class="hero-content-one container">
                <div class="row">
                    <div class="col">
                        <div class="slider-text-info">
                            <h1>Classic Leather Accessories </h1>
                            <h1>Amazing For Men's</h1>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat</p>
                            <a href="{{ route('product') }}" class="btn slider-btn uppercase"><span><i class="fa fa-plus"></i>
                                    Shop
                                    Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Content One End --> --}}
        </div>
        <div class="single-slide"
            style="background-image: url({{ asset('assets/client/images/slider/55c25cd91968ae6a32750c3988ce5397.jpg') }}">

        </div>
        <div class="single-slide"
            style="background-image: url({{ asset('assets/client/images/slider/5b24df18198a584731ec1ff849236980.jpg') }}">

        </div>
        <div class="single-slide"
            style="background-image: url({{ asset('assets/client/images/slider/f75f9c63d0608f0264f9647a26e81cc4.jpg') }}">

        </div>

    </div>
    <!-- Hero Slider end -->

    <!-- Banner area start -->
    <div class="banner-area mb--30">
        <div class="container">
            <div class="row">
                @foreach ($products->take(3) as $item)
                    <div class="col-lg-4 col-md-4">
                        <!-- single-banner start -->
                        <div class="single-banner mt--30">
                            <a href="">
                                <img style="width: 300px; height: 300px;" src="{{ asset('images_upload/' . $item->image) }}"
                                    alt="">
                                {{-- <h4>{{ $item->productName }}</h4> --}}
                            </a>

                        </div>
                        <!-- single-banner end -->
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 col-md-4">


                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="{{ route('product') }}"><img src="{{ asset('assets/client/images/banner/1.jpg') }}"
                                alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="{{ route('product') }}"><img src="{{ asset('assets/client/images/banner/2.jpg') }}"
                                alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
                <div class="col-lg-4 col-md-4">
                    <!-- single-banner start -->
                    <div class="single-banner mt--30">
                        <a href="{{ route('product') }}"><img src="{{ asset('assets/client/images/banner/3.jpg') }}"
                                alt=""></a>
                    </div>
                    <!-- single-banner end -->
                </div>
            </div> --}}
            </div>
        </div>
        <!-- Banner area end -->

        <!-- Daily Deals area start -->
        <div class="daily-deals-area section-ptb"
            style="background-image: url({{ asset('assets/client/images/bg/5f2dc6ba4b1dc82ee7d027c3310b7ba4.jpg') }})">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col">
                                <div class="daily-deals-title">
                                    <h2>Ưu đãi hằng ngày</h2>
                                    <p>Ưu đãi 5% cho tất cả sản phẩm Mac Pro</p>
                                </div>
                            </div>
                        </div>
                        <div class="deals-product-active">
                            @foreach ($products as $item)
                                <div class="daily-deals-wrap">
                                    <!-- countdown start -->
                                    <div class="countdown-deals" data-countdown="2025/03/01">
                                    </div>
                                    <!-- countdown end -->
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{ route('product.show', $item->_id) }}"><img style="width: 300px; height: 250px;"
                                                    src="{{ asset('images_upload/' . $item->image) }}" alt=""></a>
                                            <span class="label-product label-new">Mới</span>
                                            <span class="label-product label-sale">-7%</span>
                                            <div class="quick_view">
                                                <a href="#" title="quick view" class="quick-view-btn"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i
                                                        class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{ route('product.show', $item->_id) }}">{{ $item->productName }}</a></h3>
                                            <div class="price-box">
                                                <span class="new-price">{{ number_format($item->price, 0, ',', '.') }} VND
                                                </span>
                                                <span class="old-price">{{ number_format($item->price, 0, ',', '.') }} VND
                                                </span>
                                            </div>
                                            <div class="product-action">
                                                <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i>
                                                    Add
                                                    to
                                                    cart</button>
                                                <div class="star_content">
                                                    <ul class="d-flex">
                                                        <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                        </li>
                                                        <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                        </li>
                                                        <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                        </li>
                                                        <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                        </li>
                                                        <li><a class="star-o" href="#"><i
                                                                    class="fa fa-star-o"></i></a>
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
                </div>
            </div>
        </div>
        <!-- Daily Deals area end -->

        <!-- Product Area Start -->
        <div class="product-area section-pt section-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title start -->
                        <div class="section-title">
                            <h2>Sản phẩm mới</h2>
                            <p>Nâng cấp Mac, nâng cao trải nghiệm.</p>
                        </div>
                        <!-- section-title end -->
                    </div>
                </div>
                <!-- product-wrapper start -->
                <div class="product-wrapper">
                    <div class="product-slider">
                        @foreach ($products as $item)
                            <div class="col-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('product.show', $item->_id) }}"><img style="width: 300px; height: 250px;"
                                                src="{{ asset('images_upload/' . $item->image) }}" alt=""></a>
                                        <span class="label-product label-new">Mới</span>
                                        <span class="label-product label-sale">-7%</span>
                                        <div class="quick_view">
                                            <a href="#" title="quick view" class="quick-view-btn"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i
                                                    class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{ route('product.show', $item->_id) }}">{{ $item->productName }}</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">{{ number_format($item->price, 0, ',', '.') }} VND
                                            </span>
                                            <span class="old-price">{{ number_format($item->price, 0, ',', '.') }} VND
                                            </span>
                                        </div>
                                        <div class="product-action">
                                            <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i>
                                                Add to
                                                cart</button>
                                            <div class="star_content">
                                                <ul class="d-flex">
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
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

        {{-- <!-- Banner area start -->
        <div class="banner-area-two">
            <div class="container-fluid plr-40">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- single-banner start -->
                        <div class="single-banner-two mt--30">
                            <a href="{{ route('product') }}"><img
                                    src="{{ asset('assets/client/images/banner/bg1.jpg') }}" alt=""></a>
                        </div>
                        <!-- single-banner end -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- single-banner start -->
                        <div class="single-banner-two mt--30">
                            <a href="{{ route('product') }}"><img
                                    src="{{ asset('assets/client/images/banner/bg2.jpg') }}" alt=""></a>
                        </div>
                        <!-- single-banner end -->
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Banner area end -->

        <!-- Product Area Start -->
        <div class="product-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title start -->
                        <div class="section-title section-bg-2">
                            <h2>Sản phẩm bán chạy</h2>
                            <p>Liên hệ ngay để được sở hữu em nó nha.</p>
                        </div>
                        <!-- section-title end -->
                    </div>
                </div>
                <!-- product-wrapper start -->
                <div class="product-wrapper">
                    <div class="product-slider">
                        @foreach ($products as $item)
                            <div class="col-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('product.show', $item->_id) }}"><img style="width: 300px; height: 250px;"
                                                src="{{ asset('images_upload/' . $item->image) }}" alt=""></a>
                                        <span class="label-product label-new">Mới</span>
                                        <span class="label-product label-sale">-9%</span>
                                        <div class="quick_view">
                                            <a href="#" title="quick view" class="quick-view-btn"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i
                                                    class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{ route('product.show', $item->_id) }}">{{ $item->productName }}</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">{{ number_format($item->price, 0, ',', '.') }} VND
                                            </span>
                                            <span class="old-price">{{ number_format($item->price, 0, ',', '.') }} VND
                                            </span>
                                        </div>
                                        <div class="product-action">
                                            <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i>
                                                Add to
                                                cart</button>
                                            <div class="star_content">
                                                <ul class="d-flex">
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
                                                    <li><a class="star" href="#"><i class="fa fa-star"></i></a>
                                                    </li>
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

        {{-- <!-- Our Brand Area Start -->
        <div class="our-brand-area">
            <div class="container">
                <div class="row our-brand-active text-center">
                    <div class="col-12">
                        <div class="single-brand">
                            <a href="#"><img src="{{ asset('assets/client/images/brand/1.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-brand">
                            <a href="#"><img src="{{ asset('assets/client/images/brand/2.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-brand">
                            <a href="#"><img src="{{ asset('assets/client/images/brand/3.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-brand">
                            <a href="#"><img src="{{ asset('assets/client/images/brand/4.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-brand">
                            <a href="#"><img src="{{ asset('assets/client/images/brand/5.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single-brand">
                            <a href="#"><img src="{{ asset('assets/client/images/brand/6.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Brand Area End -->

        <!-- Latest Blog Posts Area start -->
        <div class="latest-blog-post-area section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title start -->
                        <div class="section-title section-bg-3">
                            <h2>Latest Blog Posts </h2>
                            <p>There are latest blog posts</p>
                        </div>
                        <!-- section-title end -->
                    </div>
                </div>
                <div class="latest-blog-slider">
                    <!-- single-latest-blog start -->
                    <div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="{{ asset('assets/client/images/blog/1.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">Work with customizer</a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>Mar 05, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been
                                the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
                    <!-- single-latest-blog start -->
                    <div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="{{ asset('assets/client/images/blog/2.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">Go to New Horizonts</a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>may 17, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been
                                the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
                    <!-- single-latest-blog start -->
                    <div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="{{ asset('assets/client/images/blog/3.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">What is Bootstrap?</a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>june 11, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been
                                the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
                    <!-- single-latest-blog start -->
                    <div class="single-latest-blog mt--30">
                        <div class="latest-blog-image">
                            <a href="blog-details.html">
                                <img src="{{ asset('assets/client/images/blog/4.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="latest-blog-content">
                            <h4><a href="blog-details.html">Try comfort work </a></h4>
                            <div class="post_meta">
                                <span class="meta_date"><span> <i class="fa fa-calendar"></i></span>Mar 13, 2018</span>
                                <span class="meta_author"><span></span>Demo Name</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been
                                the industrys standard dummy text ever since the ...</p>
                        </div>
                    </div>
                    <!-- single-latest-blog end -->
                </div>
            </div>
        </div> --}}
        <!-- Latest Blog Posts Area End -->

        <!-- Our Services Area Start -->
        <div class="our-services-area section-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <!-- single-service-item start -->
                        <div class="single-service-item">
                            <div class="our-service-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="our-service-info">
                                <h3>Miễn phí vận chuyển</h3>
                                <p>Miễn phí vận chuyển tại Hồ Chí Minh</p>
                            </div>
                        </div>
                        <!-- single-service-item end -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- single-service-item start -->
                        <div class="single-service-item">
                            <div class="our-service-icon">
                                <i class="fa fa-support"></i>
                            </div>
                            <div class="our-service-info">
                                <h3>Hỗ trợ 24/7</h3>
                                <p>Liên hệ với chúng tôi 24 giờ 1 ngày, 7 ngày trong tuần</p>
                            </div>
                        </div>
                        <!-- single-service-item end -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- single-service-item start -->
                        <div class="single-service-item">
                            <div class="our-service-icon">
                                <i class="fa fa-undo"></i>
                            </div>
                            <div class="our-service-info">
                                <h3>Hoàn trả trong 30 ngày</h3>
                                <p>Chấp nhận đổi trả trong vòng 30 ngày</p>
                            </div>
                        </div>
                        <!-- single-service-item end -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <!-- single-service-item start -->
                        <div class="single-service-item">
                            <div class="our-service-icon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <div class="our-service-info">
                                <h3>Thanh toán an toàn 100%</h3>
                                <p>Thông qua ngân hàng VCB</p>
                            </div>
                        </div>
                        <!-- single-service-item end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services Area End -->
    @endsection
