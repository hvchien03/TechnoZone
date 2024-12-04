@extends('layout.admin')
@section('title', 'Admin Page')
@section('content')
    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1">
            <div>
                <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                    <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                        <a href="javaScript:;">Quản trị</a>
                        <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5"
                                d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                                fill="currentColor" />
                        </svg>
                    </li>
                    <li>Danh sách sản phẩm</li>
                </ul>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="text-base font-semibold mb-4"><a href="{{ route('products.create') }}"
                        class="">Thêm
                        sản phẩm mới</a></h2>
                <div class="overflow-auto">
                    <table class="min-w-[640px] w-full product-table">
                        <thead>
                            <tr class="text-left">
                                <th>Sản phẩm</th>
                                <th>Loại</th>
                                <th>Hãng</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr id="product-{{ $product->id }}">
                                    <td>
                                        <div class="flex items-center gap-2.5">
                                            <img src="{{ asset('images_upload/' . $product->image) }}"
                                                class="w-[50px] rounded-lg" alt="">
                                            <div class="flex-1 max-w-[300px] truncate">
                                                <p class="line-clamp-1 truncate">{{ $product->productName }}</p>
                                                <p class="text-gray">Id: #{{ $product->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $product->Category->categoryName }}</td>
                                    <td>{{ $product->Supplier->supplierName }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td><span
                                            class="text-red-500 font-bold text-xs py-2 px-3">{{ $product->formaterPriceAttribute() }}</span>
                                    </td>
                                    <td>
                                        <a x-data="modals"
                                            class="hover:underline btn bg-success border border-success rounded-lg text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">
                                            <button type="button" @click="toggle">Show</button>
                                            <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                                                :class="open && '!block'">
                                                <div class="flex items-center justify-center min-h-screen px-4"
                                                    @click.self="open = false">
                                                    <div x-show="open" x-transition x-transition.duration.300
                                                        class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                                                        <div
                                                            class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                                            <h5 class="font-semibold text-lg text-black">
                                                                {{ $product->productName }} </h5>
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
                                                        <div class="p-5 space-y-4">
                                                            <div class="text-lightgray text-sm font-normal">
                                                                <img src="{{ asset('images_upload/' . $product->image) }}"
                                                                    alt="Product Image" class="mt-2 w-300 img-fluid">
                                                                <table
                                                                    class="min-w-[640px] w-full product-table table-striped">
                                                                    <tbody>
                                                                        <tr class="text-left">
                                                                            <td>category</td>
                                                                            <td>
                                                                                <div class="flex items-center gap-2.5">
                                                                                    <p
                                                                                        class="line-clamp-1 max-w-[200px] truncate">
                                                                                        {{ $product->Category->categoryName }}
                                                                                    </p>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr class="text-left">
                                                                            <td>supplier</td>
                                                                            <td>
                                                                                <div class="flex items-center gap-2.5">
                                                                                    <p
                                                                                        class="line-clamp-1 max-w-[200px] truncate">
                                                                                        {{ $product->Supplier->supplierName }}
                                                                                    </p>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr class="text-left">
                                                                            <td>stock</td>
                                                                            <td>
                                                                                <div class="flex items-center gap-2.5">
                                                                                    <p
                                                                                        class="line-clamp-1 max-w-[200px] truncate">
                                                                                        {{ $product->stock }}</p>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                        <tr class="text-left">
                                                                            <td>price</td>
                                                                            <td>
                                                                                <div class="flex items-center gap-2.5">
                                                                                    <p
                                                                                        class="line-clamp-1 max-w-[200px] truncate">
                                                                                        {{ $product->formaterPriceAttribute() }}
                                                                                    </p>
                                                                                </div>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="flex justify-end items-center gap-4">
                                                                <button type="button"
                                                                    class="btn border text-danger border-transparent rounded-lg transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10"
                                                                    @click="toggle">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{ route('products.update', ['id' => $product->id]) }}"
                                            class="hover:underline btn bg-success border border-success rounded-lg text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Chỉnh sửa</a>
                                        <a href="javascript:void(0);" onclick="confirmDelete('{{ $product->id }}')"
                                            class="btn-delete hover:underline btn bg-danger border border-danger rounded-lg text-white transition-all duration-300 hover:bg-danger/[0.85] hover:border-danger/[0.85]">
                                            Xoá
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

@endsection
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xoá sản phẩm này?',
            text: 'Bạn sẽ không thể hoàn tác hành động này!',
            icon: 'Cảnh báo',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xoá',
            cancelButtonText: 'Huỷ'
        }).then((result) => {
            if (result.isConfirmed) {
                deleteProduct(id);
            }
        });
    }

    function deleteProduct(id) {
        $.ajax({
            url: '{{ route('products.delete', ':id') }}'.replace(':id', id),
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token for security
            },
            success: function(response) {
                Swal.fire(
                    'Deleted!',
                    'Product has been deleted.',
                    'success'
                );
                // Remove the product from the UI
                $('#product-' + id).remove();
            },
            error: function(xhr, status, error) {
                Swal.fire(
                    'Error!',
                    'Failed to delete product: ' + xhr.responseText,
                    'error'
                );
            }
        });
    }
</script>
