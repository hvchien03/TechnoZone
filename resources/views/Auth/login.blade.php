@extends('layout.client')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đăng nhập/đăng ký</li>
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
                <div class="col-lg-7 col-md-12 m-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" href="{{ route('login') }}">
                                <h4> Đăng nhập </h4>
                            </a>
                            <a href="{{ route('register') }}">
                                <h4> Đăng ký </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf  <!-- Bảo vệ khỏi tấn công CSRF -->
                                            <div class="login-input-box">
                                                <input type="email" name="email" placeholder="Email" required>
                                                <input type="password" name="password" placeholder="Mật khẩu" required>
                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" name="remember">
                                                    <label>Ghi nhớ tôi</label>
                                                    {{-- <a href="#">Forgot Password?</a> --}}
                                                </div>
                                                <div class="button-box">
                                                    <button class="login-btn btn" type="submit"><span>Đăng nhập</span></button>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Hiển thị thông báo lỗi nếu có -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
@endsection
