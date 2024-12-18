<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TechnoZone</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('{{ asset('assets/client/client/images/favicon.ico') }}"> --}}

    <!-- CSS
    ========================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}">

    <!-- Font CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/font-awesome.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">

    <!-- Modernizer JS -->
    <script src="{{ asset('assets/client/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>

    <!-- Main Wrapper Start -->
    <div class="main-wrapper">
        <!-- header-area start -->
        <div class="header-area">
            <!-- header-top start -->
            <div class="header-top bg-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 order-2 order-lg-1">
                            <div class="top-left-wrap">
                                <ul class="phone-email-wrap">
                                    <li><i class="fa fa-phone"></i> (08)123 456 7890</li>
                                    <li><i class="fa fa-envelope-open-o"></i> technozone@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 order-1 order-lg-2">
                            <div class="top-selector-wrapper">
                                <ul class="single-top-selector">
                                    <!-- Sanguage Start -->
                                    <li class="setting-top list-inline-item">
                                        @auth
                                            {{ Auth::User()->name }}
                                        @endauth
                                        <div class="btn-group">
                                            <button class="dropdown-toggle"><i class="fa fa-user-circle-o"></i> Tài
                                                khoản
                                                <i class="fa fa-angle-down"></i></button>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    @auth
                                                        <!-- Khi người dùng đã đăng nhập -->
                                                        <li><a href="{{route('order.index')}}">Đơn hàng</a></li>
                                                        <li><a href="{{ route('orderhistory.index') }}">Lịch sử đơn
                                                                hàng</a>
                                                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                                    @else
                                                        <!-- Khi người dùng chưa đăng nhập -->
                                                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                                    @endauth
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header-top end -->
            <!-- Header-bottom start -->
            <div class="header-bottom-area header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-4">
                            <!-- logo start -->
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <h3>TECHNOZONE</h3>
                                    {{-- <img src="{{ asset('assets/client/images/logo/logo.jpg') }}" alt=""> --}}
                                </a>
                            </div>
                            <!-- logo end -->
                        </div>
                        <div class="col-lg-7 d-none d-lg-block">
                            <!-- main-menu-area start -->
                            <div class="main-menu-area">
                                <nav class="main-navigation">
                                    <ul>
                                        <li class="active"><a href="{{ route('home') }}">Trang chủ</a>
                                        </li>
                                        <li><a href="{{ route('product') }}">Mac <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                @foreach ($categoryAllView as $item)
                                                    <li>
                                                        <a
                                                            href="{{ route('product.category', $item->_id) }}">{{ $item->categoryName }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                        <li><a href="{{ route('service') }}">Dịch vụ</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- main-menu-area End -->
                        </div>
                        <div class="col-lg-3 col-8">
                            <div class="header-bottom-right">
                                <div class="block-search">
                                    <div class="trigger-search"><i class="fa fa-search"></i> <span>Tìm kiếm</span>
                                    </div>
                                    <div class="search-box main-search-active">
                                        <form action="{{ route('product') }}" method="GET"
                                            class="search-box-inner search-form">
                                            <input type="text" id="search" name="key"
                                                value="{{ request('key', '') }}" placeholder="Tìm kiếm sản phẩm....">
                                            <button class="search-btn" type="submit"><i
                                                    class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="shoping-cart">
                                    <div class="btn-group">
                                        <!-- Mini Cart Button start -->
                                        <button class="dropdown-toggle">
                                            <a href="{{ route('cart') }}">
                                                <i class="fa fa-shopping-cart"></i> Giỏ
                                                hàng
                                            </a>
                                        </button>

                                        <!-- Mini Cart button end -->

                                        <!-- Mini Cart wrap start -->
                                        <div class="dropdown-menu mini-cart-wrap">
                                        </div>
                                        <!-- Mini Cart wrap End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <!-- mobile-menu start -->
                            <div class="mobile-menu d-block d-lg-none"></div>
                            <!-- mobile-menu end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header-bottom end -->
        </div>
        <!-- Header-area end -->
        @yield('content')

        <!-- Footer Aare Start -->
        <footer class="footer-area">
            <!-- footer-top start -->
            <div class="footer-top pt--50 section-pb">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <!-- footer-info-area start -->
                            <div class="footer-info-area">
                                <div class="footer-logo">
                                    <a href="#">
                                        <h3 class="text-white">TECHNOZONE</h3>
                                    </a>
                                </div>
                                <div class="desc_footer">
                                    <p><i class="fa fa-home"></i> <span> 140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân
                                            Phú, TP.HCM.</span> </p>
                                    <p><i class="fa fa-phone"></i> <span> (0) 800 456 789</span> </p>
                                    <p><i class="fa fa-envelope-open-o"></i> <span> technozone@gmail.com</span> </p>
                                    <div class="link-follow-footer">
                                        <ul class="footer-social-share">
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- footer-info-area end -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <!-- footer-info-area start -->
                            <div class="footer-info-area">
                                <div class="footer-title">
                                    <h3>Tham gia để nhận được thông báo mới nhất </h3>
                                </div>
                                <div class="desc_footer">
                                    <div class="input-newsletter">
                                        <input name="email" class="input_text" value=""
                                            placeholder="Your email address" type="text">
                                        <button class="btn-newsletter"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                    <p>Nhận email cập nhật về cửa hàng mới nhất và các ưu đãi đặc biệt của chúng tôi.
                                    </p>
                                </div>
                            </div>
                            <!-- footer-info-area end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-top end -->
        </footer>
        <!-- Footer Aare End -->



        <!-- Modal Algemeen Uitgelicht start -->

        <!-- Modal Algemeen Uitgelicht end -->


    </div>
    <!-- Main Wrapper End -->

    <!-- JS
 ============================================ -->

    <!-- jQuery JS -->
    <script src="{{ asset('assets/client/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('assets/client/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/client/js/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('assets/client/js/plugins.js') }}"></script>
    <!-- Ajax Mail -->
    <script src="{{ asset('assets/client/js/ajax-mail.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/jquery-3.5.1.min.js') }}"></script>
    @stack('scripts')

</body>

</html>
