@extends('Layout.client')
@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chính sách bảo hành</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div class="content-wraper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="service-policy-area">
                    <h1 class="service-title text-center mb-5">Chính Sách Bảo Hành, Đổi Trả Sản Phẩm</h1>

                    <div class="row">
                        <!-- Box 1 -->
                        <div class="col-lg-6 mb-4">
                            <div class="policy-box">
                                <div class="policy-icon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <h2 class="policy-title">Đối với Laptop, PC mới chính hãng</h2>
                                <ul class="policy-list">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Bảo hành chính hãng 12-24 tháng (tùy thương hiệu)</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>1 đổi 1 trong 15 ngày đầu nếu có lỗi phần cứng từ nhà sản xuất</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Hỗ trợ cài đặt phần mềm, vệ sinh máy miễn phí trọn đời</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Tặng kèm gói bảo hành VIP: ưu tiên xử lý, hỗ trợ 24/7</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Box 2 -->
                        <div class="col-lg-6 mb-4">
                            <div class="policy-box">
                                <div class="policy-icon">
                                    <i class="fa fa-microchip"></i>
                                </div>
                                <h2 class="policy-title">Đối với Linh kiện & Phụ kiện</h2>
                                <ul class="policy-list">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>RAM, SSD, HDD: Bảo hành 36 tháng theo nhà sản xuất</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Bàn phím, Chuột: Bảo hành 12-24 tháng theo nhà sản xuất</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Pin laptop: Bảo hành 6-12 tháng</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Sạc laptop: Bảo hành 12 tháng</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Box 3 -->
                        <div class="col-lg-6 mb-4">
                            <div class="policy-box">
                                <div class="policy-icon">
                                    <i class="fa fa-shield"></i>
                                </div>
                                <h2 class="policy-title">Điều kiện bảo hành</h2>
                                <ul class="policy-list">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Sản phẩm còn nguyên tem bảo hành và trong thời hạn bảo hành</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Lỗi do nhà sản xuất (không bảo hành các lỗi do người dùng gây ra như: rơi, vỡ, va đập, vào nước...)</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Không bảo hành phần mềm, virus, spyware</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Box 4 -->
                        <div class="col-lg-6 mb-4">
                            <div class="policy-box">
                                <div class="policy-icon">
                                    <i class="fa fa-refresh"></i>
                                </div>
                                <h2 class="policy-title">Chính sách đổi trả</h2>
                                <ul class="policy-list">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Đổi mới trong 15 ngày đầu nếu sản phẩm lỗi phần cứng</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Hoàn tiền 100% trong 7 ngày nếu sản phẩm lỗi không thể khắc phục</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <span>Đối với đơn hàng online: Được kiểm tra hàng trước khi nhận</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="warranty-contact mt-5">
                        <h3 class="contact-title">Địa chỉ Bảo hành:</h3>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i> <strong>Showroom:</strong> 140 Lê Trọng Tấn, P.Tây Thạnh, Q.Tân Phú, TP.HCM</p>
                            <p><i class="fa fa-phone"></i> <strong>Hotline bảo hành:</strong> 0906 111 111</p>
                            <p><i class="fa fa-clock-o"></i> <strong>Thời gian làm việc:</strong> 8h00 - 21h00 (Tất cả các ngày trong tuần)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
