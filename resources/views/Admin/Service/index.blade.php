@extends('layout.admin')
@section('title', 'Admin Page')
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
                <li>Danh sách yêu cầu</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-base font-semibold">
                    <a href="{{ route('admin.service.create') }}"
                        class="hover:underline btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">
                        Tạo đơn yêu cầu
                    </a>
                </h2>
                <div class="flex gap-4">
                    <div class="relative">
                        <input type="text" id="searchCustomer"
                               placeholder="Tìm kiếm khách hàng..."
                               class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-primary">
                    </div>
                </div>
            </div>
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full product-table">
                    <thead>
                        <tr class="text-left">
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Ngày lập đơn</th>
                            <th>Loại đơn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="customerTableBody">
                        @foreach ($requests as $request)
                        <tr id="customer-{{ $request->id }}" class="customer-row">
                            <td>{{ $loop->iteration }}</td>
                            <td class="customer-name">{{ $request->user->name }}</td>
                            <td class="customer-phone">{{ $request->user->phone }}</td>
                            <td class="customer-phone">{{ $request->created_at->format('d/m/Y - H:i') }}</td>
                            <td>{{ $request->requestDetails['type'] }}</td>
                            <td>{{ $request->requestDetails['status'] }}</td>
                            <td>
                                <a href="{{ route('admin.service.details', ['id' => $request->id]) }}"
                                    class="hover:underline btn bg-primary border border-primary rounded-full text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
                                    Xem chi tiết
                                </a>
                                <a x-data="modals"
                                    class="hover:underline btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">
                                    <button type="button" @click="toggle">Cập nhật trạng thái</button>
                                    <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                                        :class="open && '!block'">
                                        <div class="flex items-center justify-center min-h-screen px-4"
                                            @click.self="open = false">
                                            <div x-show="open" x-transition x-transition.duration.300
                                                class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg max-h-[90vh]">
                                                <div
                                                    class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                                    <h5 class="font-semibold text-lg text-black">Cập nhật trạng thái yêu cầu</h5>
                                                    <button type="button" class="text-lightgray hover:text-primary"
                                                        @click="toggle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            class="w-5 h-5">
                                                            <path
                                                                d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="p-5 space-y-4 overflow-y-auto">
                                                    <div class="text-lightgray text-sm font-normal">
                                                        <form action="{{ route('admin.service.update') }}" id="updateStatusForm" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="request_id" value="{{ $request->id }}">
                                                            <div class="grid gap-4">
                                                                <div class="grid grid-cols-3 items-center">
                                                                    <label class="font-medium">Trạng thái:</label>
                                                                    <div class="col-span-2">
                                                                        <select name="status" class="w-full px-3 py-2 border rounded-md">
                                                                            <option value="Đang xử lý" {{ $request->requestDetails['status'] == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                                                                            <option value="Hoàn thành" {{ $request->requestDetails['status'] == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                                                                            <option value="Đã huỷ" {{ $request->requestDetails['status'] == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="grid grid-cols-3 items-start">
                                                                    <label class="font-medium pt-2">Ghi chú:</label>
                                                                    <div class="col-span-2">
                                                                        <textarea name="note" rows="3" class="w-full px-3 py-2 border rounded-md resize-none" placeholder="Ghi chú">{{ $request->requestDetails['notes'] }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="flex justify-end mt-6">
                                                                <button type="submit"
                                                                        class="btn bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">
                                                                    Cập nhật
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#updateStatusForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    toastr.options = {
                        timeOut: 1000,
                        onHidden: function() {
                            location.reload();
                        }
                    };
                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    toastr.error("Có lỗi xảy ra!");
                }
            });
        });
        $('#searchCustomer').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $("#customerTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endpush
@endsection
