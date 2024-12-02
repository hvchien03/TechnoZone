@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Liên hệ</li>
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
                <div class="col-lg-7 col-sm-12">
                    <div class="contact-form">
                        <div class="contact-form-info">
                            <div class="contact-title">
                                <h3>Hãy cho chúng tôi biết ý kiến của bạn</h3>
                            </div>
                            <form id="contact-form" action="https://htmldemo.net/boyka/boyka/email.php" method="POST">
                                <div class="contact-page-form">
                                    <div class="contact-input">
                                        <div class="contact-inner">
                                            <input name="name" type="text" placeholder="Họ và tên *" id="first-name">
                                        </div>

                                        <div class="contact-inner">
                                            <input type="text" placeholder="Email *" id="email" name="email">
                                        </div>
                                        <div class="contact-inner">
                                            <input name="subject" type="text" placeholder="Tiêu đề *" id="subject">
                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea name="message" placeholder="Nội dung *"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-submit-btn">
                                        <button class="submit-btn" type="submit">Gửi Email</button>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="contact-infor">
                        <div class="contact-title">
                            <h3>Về chúng tôi</h3>
                        </div>
                        <div class="contact-dec">
                            <p></p>
                        </div>
                        <div class="contact-address">
                            <ul>
                                <li><i class="fa fa-fax"> </i> Địa chỉ : 140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, TP.HCM</li>
                                <li><i class="fa fa-phone">&nbsp;</i> technozone@gmail.com</li>
                                <li><i class="fa fa-envelope-o">&nbsp;</i> 0(1234) 567 890</li>
                            </ul>
                        </div>
                        <div class="work-hours">
                            <h3><strong>Giờ làm việc</strong></h3>
                            <p><strong>Thứ hai &ndash; Thứ bảy</strong>: &nbsp;08 sáng &ndash; 22 tối</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
@endsection
