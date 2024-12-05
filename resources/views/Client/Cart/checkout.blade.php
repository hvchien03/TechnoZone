@extends('layout.client')
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wraper">
        <div class="container"> 
            <form action="{{ route('process') }}" method="POST" id="checkoutForm">
                @csrf
                <div class="row">
                    <!-- Thông tin đặt hàng -->
                    <div class="col-lg-7">
                        <div class="billing-details-wrap">
                            <h3 class="shoping-checkboxt-title">Thông tin đặt hàng</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Họ và tên <span class="required">*</span></label>
                                        <input type="text" name="name" required>
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Số điện thoại <span class="required">*</span></label>
                                        <input type="tel" name="phone" required>
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Địa chỉ chi tiết <span class="required">*</span></label>
                                        <input type="text" name="address" placeholder="Số nhà, tên đường" required>
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-form-row">
                                        <label>Tỉnh/Thành phố <span class="required">*</span></label>
                                        <select name="city" id="city" required>
                                            <option value="">Chọn Tỉnh/Thành phố</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-form-row">
                                        <label>Quận/Huyện <span class="required">*</span></label>
                                        <select name="district" id="district" required>
                                            <option value="">Chọn Quận/Huyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-form-row">
                                        <label>Phường/Xã <span class="required">*</span></label>
                                        <select name="ward" id="ward" required>
                                            <option value="">Chọn Phường/Xã</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="single-form-row">
                                        <label>Ghi chú đơn hàng</label>
                                        <textarea name="note" placeholder="Ghi chú về đơn hàng của bạn, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title">Đơn hàng của bạn</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <!-- your-order-table start -->
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cartItems as $item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                                <td>{{ number_format($item['subtotal']) }}đ</td>
                                            </tr>
                                            @endforeach   
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">Tạm tính</th>
                                                <td>{{ number_format($cartTotal) }}đ</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Phí vận chuyển</th>
                                                <td>{{ number_format($shipping ?? 0)  }}đ</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Tổng cộng</th>
                                                <td><strong>{{ number_format(($cartTotal + ($shipping ?? 0))) }}đ</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- your-order-table end -->
                            </div>
                                <!-- your-order-wrap end -->
                            <div class="payment-methods mt-4">
                                <h4>Phương thức thanh toán</h4>
                                    <div class="payment-option">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="payment_method" id="cod" value="cod" required>
                                            <label class="form-check-label" for="cod">
                                                <strong>Thanh toán khi nhận hàng (COD)</strong>
                                                <div class="text-muted">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- ACCORDION END -->
                                    <!-- ACCORDION START -->
                                    <div class="payment-option">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="payment_method" id="momo" value="momo" required>
                                            <label class="form-check-label" for="momo">
                                                <div class="d-flex align-items-center">
                                                    <strong class="me-2">Thanh toán qua Ví MoMo</strong>
                                                    <img src="{{ asset('assets/client/images/logo/momo.jpeg') }}" alt="Momo" width="30" height="30" class="rounded">
                                                </div>
                                                <div class="text-muted">Thanh toán qua ví điện tử MoMo</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-button-payment mt-4 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Đặt hàng</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    // Load tỉnh/thành phố
    $.ajax({
        url: '/api/provinces',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log('Dữ liệu tỉnh/thành:', response);
            let html = '<option value="">Chọn Tỉnh/Thành phố</option>';
            if (Array.isArray(response)) {
                response.forEach(function(province) {
                    html += `<option value="${province.name}" data-code="${province.code}">${province.name}</option>`;
                });
            }
            $('#city').html(html);
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi tải tỉnh/thành:', {
                status: xhr.status,
                error: error,
                response: xhr.responseText
            });
        }
    });

    // Load quận/huyện
    $('#city').change(function() {
        let provinceCode = $(this).find(':selected').data('code');
        if(provinceCode) {
            $.ajax({
                url: `/api/districts/${provinceCode}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let html = '<option value="">Chọn Quận/Huyện</option>';
                    if (Array.isArray(response)) {
                        response.forEach(function(district) {
                            html += `<option value="${district.name}" data-code="${district.code}">${district.name}</option>`;
                        });
                    }
                    $('#district').html(html);
                    $('#ward').html('<option value="">Chọn Phường/Xã</option>');
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi tải quận/huyện:', error);
                }
            });
        }
    });

    // Load phường/xã
    $('#district').change(function() {
        let districtCode = $(this).find(':selected').data('code');
        if(districtCode) {
            $.ajax({
                url: `/api/wards/${districtCode}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let html = '<option value="">Chọn Phường/Xã</option>';
                    if (Array.isArray(response)) {
                        response.forEach(function(ward) {
                            html += `<option value="${ward.name}">${ward.name}</option>`;
                        });
                    }
                    $('#ward').html(html);
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi tải phường/xã:', error);
                }
            });
        }
    });


    // Xử lý form đặt hàng
    $('#checkoutForm').on('submit', function(e) {
        e.preventDefault();
        
        let paymentMethod = $('input[name="payment_method"]:checked').val();
        let formData = $(this).serialize();

        if (paymentMethod === 'momo') {
            // Gọi API tạo thanh toán MoMo
            $.ajax({
                url: '{{ route("create_momo_payment") }}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                timeout: 60000,
                success: function(response) {
                    if (response.payUrl) {
                        // Redirect tới trang thanh toán MoMo
                        window.location.href = response.payUrl;
                    } else {
                        alert('Không thể tạo thanh toán MoMo. Vui lòng thử lại!');
                    }
                },
                error: function(xhr, textStatus, error) {
                    if (textStatus === 'timeout') {

                        alert('Yêu cầu đã hết thời gian chờ. Vui lòng thử lại!');
                    } else {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại!');
                    }
                    console.error(xhr.responseText, textStatus, error);
                }
            });
        } else {
            // Submit form bình thường cho COD
            $(this).unbind('submit').submit();
        }
    });
});
</script>
@endpush
