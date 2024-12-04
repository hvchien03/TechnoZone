@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Login Register</li>
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
                            <a href="{{ route('login') }}">
                                <h4> Đăng nhập </h4>
                            </a>
                            <a class="active" href="{{ route('register') }}">
                                <h4> Đăng ký </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg2" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('register') }}" method="post">
                                            @csrf
                                            <div class="login-input-box">
                                                @error('name')
                                                    <span class="text-danger float-end">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="name" placeholder="Họ và tên"
                                                    value="{{ old('name') }}">
                                                @error('email')
                                                    <span class="text-danger float-end">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="email" placeholder="Email"
                                                    value="{{ old('email') }}">
                                                @error('password')
                                                    <span class="text-danger float-end">{{ $message }}</span>
                                                @enderror
                                                <input type="password" name="password" placeholder="Mật khẩu"
                                                    value="{{ old('password') }}">
                                                @error('password_confirmation')
                                                    <span class="text-danger float-end">{{ $message }}</span>
                                                @enderror
                                                <input type="password" name="password_confirmation"
                                                    placeholder="Nhập lại mật khẩu"
                                                    value="{{ old('password_confirmation') }}">
                                                @error('phone')
                                                    <span class="text-danger float-end">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="phone" placeholder="Số điện thoại"
                                                    value="{{ old('phone') }}">
                                                @error('address')
                                                    <span class="text-danger float-end">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="address" placeholder="Địa chỉ"
                                                    value="{{ old('address') }}">
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn"
                                                    type="submit"><span>Đăng ký</span></button>
                                            </div>
                                        </form>
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
