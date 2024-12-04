@extends('layout.admin')
@section('title', 'Chi tiết yêu cầu')
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
                <li>Chi tiết yêu cầu</li>
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="mb-6">
                <h2 class="text-xl font-bold mb-4">Thông tin khách hàng</h2>
                <form class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Tên khách hàng</label>
                            <input type="text" class="form-input w-full" value="{{ $request->user->name }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" class="form-input w-full" value="{{ $request->user->email }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Số điện thoại</label>
                            <input type="tel" class="form-input w-full" value="{{ $request->user->phone }}" readonly>
                        </div>
                    </div>
                    <div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Ngày tạo đơn</label>
                            <input type="text" class="form-input w-full" value="{{ $request->created_at->format('d/m/Y H:i') }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Loại yêu cầu</label>
                            <input type="text" class="form-input w-full" value="{{ $request->requestDetails['type'] }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Trạng thái</label>
                            <input type="text" class="form-input w-full" value="{{ $request->requestDetails['status'] }}" readonly>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-bold mb-4">Chi tiết sản phẩm</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto mb-8">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Tên sản phẩm</th>
                                <th class="px-4 py-2 text-left">Số lượng</th>
                                <th class="px-4 py-2 text-left">Lý do</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($request->orders['products'] as $item)
                                @php
                                    $product = App\Models\Product::find($item['productId']);
                                @endphp
                                <tr>
                                    <td class="px-4 py-2">{{ $product->productName }}</td>
                                    <td class="px-4 py-2">{{ $item['quantity'] }}</td>
                                    <td class="px-4 py-2">{{ $request->requestDetails['reason'] }}</td>
                                </tr>
                            @endforeach
                            <tr style="border-bottom: 3px solid #f4f5f9;">
                                <td colspan="3" class="border-t border-gray-100"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div>
                <h2 class="text-xl font-bold mb-4">Lịch sử xử lý</h2>
                <form id="actionForm" class="mb-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Hành động</label>
                            <select name="action" class="form-select w-full">
                                <option value="Đang chờ kiện hàng">Đang chờ kiện hàng</option>
                                <option value="Kiểm tra sản phẩm">Kiểm tra sản phẩm</option>
                                <option value="Đang chờ nhận hàng">Đang chờ nhận hàng</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Ngày hẹn</label>
                            <input type="datetime-local" name="scheduledDate" class="form-input w-full">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Trạng thái</label>
                        <select name="status" class="form-select w-full">
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Hoàn tất">Hoàn tất</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm hành động</button>
                </form>

                <div id="actionHistory" class="flex flex-row gap-4 overflow-x-auto">
                    @if(isset($request->requestDetails['actions']))
                        @foreach($request->requestDetails['actions'] as $action)
                        <div class="min-w-[200px] p-4 rounded-lg border {{ $action['status'] == 'Đang xử lý' ? 'border-blue-500 bg-blue-50' : ($action['status'] == 'Hoàn thành' ? 'border-green-500 bg-green-50' : 'border-gray-200') }}">
                            <div>
                                <span class="w-3 h-3 rounded-full"></span>
                                <p class="font-semibold">
                                    {{ $action['actionType'] }}
                                </p>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">{{ \Carbon\Carbon::parse($action['scheduledDate'])->format('d/m/Y H:i') }}</p>
                            <p>{{ $action['status'] }}</p>
                            @if($action['status'] == 'Đang xử lý')
                                <button class="mt-2 px-2 py-1 bg-success text-white rounded hover:bg-success/[0.85] text-sm">
                                    Cập nhật
                                </button>
                            @endif
                        </div>
                        @endforeach
                    @else
                        <p>Chưa có lịch sử xử lý</p>
                    @endif
                </div>
            </div> --}}
        </div>
    </div>
</div>

<script>
document.getElementById('actionForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    // Gửi Ajax request để cập nhật action
    fetch(`/admin/service/update-action/${requestId}`, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        // Cập nhật lịch sử hiển thị
        const actionHistory = document.getElementById('actionHistory');
        const newAction = `
            <div class="border-l-4 border-primary pl-4">
                <p class="font-semibold">${data.status}</p>
                <p class="text-sm text-gray-600">${data.scheduledDate}</p>
                <p>${data.note || 'Không có ghi chú'}</p>
            </div>
        `;
        actionHistory.insertAdjacentHTML('afterbegin', newAction);

        // Reset form
        this.reset();
    });
});
</script>

@endsection
