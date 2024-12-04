@extends('Layout.admin')
@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Trang chủ</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                            fill="currentColor" />
                    </svg>
                </li>
                <li>Tạo đơn bảo hành</li>
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <form id="warrantyForm" action="{{ route('admin.service.store') }}" method="POST">
                @csrf
                <div class="grid gap-6 max-w-4xl mx-auto">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-4">Thông tin khách hàng</h3>
                        <input type="hidden" id="customerId" name="customerId">
                        <div class="grid gap-4">
                            <div class="grid grid-cols-3 items-center">
                                <label class="font-medium">Số điện thoại:</label>
                                <div class="col-span-2">
                                    <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border rounded-md" placeholder="Nhập số điện thoại">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 items-center">
                                <label class="font-medium">Tên khách hàng:</label>
                                <div class="col-span-2">
                                    <input type="text" id="customerName" name="customerName" class="w-full px-3 py-2 border rounded-md" readonly>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 items-center">
                                <label class="font-medium">Đơn hàng:</label>
                                <div class="col-span-2">
                                    <select name="orderId" id="orderSelect" class="w-full px-3 py-2 border rounded-md" disabled>
                                        <option value="">Chọn đơn hàng</option>
                                    </select>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thông tin đơn bảo hành -->
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-4">Thông tin bảo hành</h3>
                        <div class="grid gap-4">
                            <div class="grid grid-cols-3 items-center">
                                <label class="font-medium">Loại đơn:</label>
                                <div class="col-span-2">
                                    <select name="serviceType" class="w-full px-3 py-2 border rounded-md">
                                        <option value="" selected hidden>Chọn loại bảo hành</option>
                                        <option value="Sửa chữa">Sửa chữa</option>
                                        <option value="Bảo hành">Bảo hành</option>
                                        <option value="Đổi trả">Đổi trả</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 items-center">
                                <label class="font-medium">Ghi chú:</label>
                                <div class="col-span-2">
                                    <textarea name="notes" rows="3" class="w-full px-3 py-2 border rounded-md" placeholder="Nhập ghi chú..."></textarea>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 items-center">
                                <label class="font-medium">Lý do:</label>
                                <div class="col-span-2">
                                    <textarea name="reason" rows="3" class="w-full px-3 py-2 border rounded-md" placeholder="Nhập lý do..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chi tiết đơn hàng -->
                    <div id="orderDetails" class="p-4 hidden">
                        <h3 class="font-semibold text-lg mb-4">Chi tiết đơn hàng</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sản phẩm</th>
                                        <th class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Số lượng</th>
                                        <th class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody id="orderProducts" class="bg-white divide-y divide-gray-200">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">
                            Tạo đơn
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    let typingTimer;
    const doneTypingInterval = 1000;
    let customerOrders = [];

    $('#phone').on('keyup', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function() {
            const phone = $('#phone').val();
            if (phone.length > 0) {
                $.ajax({
                    url: '/api/customers/search',
                    method: 'GET',
                    data: { phone: phone },
                    success: function(response) {
                        if (response.customer) {
                            $('#customerName').val(response.customer.name);
                            $('#orderSelect').prop('disabled', false);
                            $('#customerId').val(response.customer.id);
                            getCustomerOrders(response.customer.id);
                        } else {
                            $('#customerName').val('');
                            $('#orderSelect').prop('disabled', true).empty().append('<option value="">Chọn đơn hàng</option>');
                            $('#orderDetails').addClass('hidden');
                        }
                    },
                    error: function() {
                        toastr.error('Có lỗi xảy ra khi tìm kiếm khách hàng');
                    }
                });
            }
        }, doneTypingInterval);
    });

    $('#orderSelect').on('change', function() {
        const selectedOrderId = $(this).val();
        if (selectedOrderId) {
            $('#orderDetails').removeClass('hidden');
            displayOrderProducts(selectedOrderId);
        } else {
            $('#orderDetails').addClass('hidden');
        }
    });

    function getCustomerOrders(userId) {
        $.ajax({
            url: '/api/customers/orders',
            method: 'GET',
            data: { userId: userId },
            success: function(response) {
                if (response.success) {
                    customerOrders = response.orders; // Lưu danh sách đơn hàng
                    $('#orderSelect').empty().append('<option hidden selected value="">Chọn đơn hàng</option>');
                    customerOrders.forEach(function(order) {
                        $('#orderSelect').append(
                            `<option value="${order.id}">
                                Đơn hàng #${order.id} - ${order.date} - ${order.total}
                            </option>`
                        );
                    });
                } else {
                    toastr.error('Không tìm thấy đơn hàng');
                }
            },
            error: function() {
                toastr.error('Có lỗi xảy ra khi lấy danh sách đơn hàng');
            }
        });
    }

    function displayOrderProducts(orderId) {
        const $tbody = $('#orderProducts');
        $tbody.empty();

        const selectedOrder = customerOrders.find(order => order.id === orderId);
        if (selectedOrder && selectedOrder.products) {
            selectedOrder.products.forEach(product => {
                $tbody.append(`
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">${product.productName}</td>
                        <td class="px-6 py-4 text-center">${product.quantity}</td>
                        <td class="px-6 py-4 text-center">${product.price}</td>
                    </tr>
                `);
            });
        }
    }

    function resetForm() {
        $('#customerName').val('');
        $('#customerId').val('');
        $('#orderSelect').prop('disabled', true)
                        .empty()
                        .append('<option hidden selected value="">Chọn đơn hàng</option>');
        $('#orderDetails').addClass('hidden');
        customerOrders = [];
    }

    $('#warrantyForm').on('submit', function(e) {
        e.preventDefault();
        const serviceType = $('select[name="serviceType"]').val();
        const selectedOrderId = $('#orderSelect').val();

        if (!selectedOrderId) {
            toastr.error('Vui lòng chọn đơn hàng');
            return false;
        }

        const selectedOrder = customerOrders.find(order => order.id === selectedOrderId);
        if (!selectedOrder) return false;

        const dateParts = selectedOrder.date.split('/');
        const deliveryDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
        const currentDate = new Date();
        const daysDifference = Math.floor((currentDate - deliveryDate) / (1000 * 60 * 60 * 24));

        let isValid = true;
        let errorMessage = '';

        switch(serviceType) {
            case 'Đổi trả':
                if (daysDifference > 7) {
                    isValid = false;
                    errorMessage = 'Đơn đổi trả chỉ hợp lệ trong vòng 7 ngày kể từ ngày giao hàng';
                }
                break;

            case 'Bảo hành':
                if (daysDifference > 365) {
                    isValid = false;
                    errorMessage = 'Thời hạn bảo hành đã hết (1 năm kể từ ngày giao hàng)';
                }
                break;

            case 'Sửa chữa':
                break;

            default:
                isValid = false;
                errorMessage = 'Vui lòng chọn loại đơn';
        }

        if (!isValid) {
            toastr.error(errorMessage);
            return false;
        }
        this.submit();
    });
});
</script>
@endpush
@endsection
