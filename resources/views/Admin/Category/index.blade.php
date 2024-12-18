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
                    <li>Danh sách loại sản phẩm</li>
                </ul>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="text-base font-semibold mb-4"><a href="{{ route('categories.create') }}"
                        class="hover:underline btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Thêm loại sản phẩm mới</a></h2>
                <div class="overflow-auto">
                    <table class="min-w-[640px] w-full category-table">
                        <thead>
                            <tr class="text-left">
                                <th>Tên loại</th>
                                <th>Mô tả</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr id="category-{{ $category->id }}">
                                    <td>
                                        <div class="flex items-center gap-2.5">
                                            <div class="flex-1 max-w-[300px] truncate">
                                                <p class="line-clamp-1 truncate">{{ $category->categoryName }}</p>
                                                <p class="text-gray">Id: #{{ $category->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ route('categories.update', ['id' => $category->id]) }}"
                                            class="hover:underline btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Chỉnh sửa</a>
                                        <a href="javascript:void(0);" onclick="confirmDelete('{{ $category->id }}')"
                                            class="btn-delete hover:underline btn bg-danger border border-danger rounded-full text-white transition-all duration-300 hover:bg-danger/[0.85] hover:border-danger/[0.85]">
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
            title: 'Bạn có chắc chắn muốn xoá loại sản phẩm này?',
            text: 'Bạn sẽ không thể hoàn tác hành động này!',
            icon: 'Cảnh báo',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xoá',
            cancelButtonText: 'Huỷ'
        }).then((result) => {
            if (result.isConfirmed) {
                deletecategory(id);
            }
        });
    }

    function deletecategory(id) {
        $.ajax({
            url: '{{ route('categories.delete', ':id') }}'.replace(':id', id),
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}', // Include CSRF token for security
            },
            success: function(response) {
                Swal.fire(
                    'Deleted!',
                    'category has been deleted.',
                    'success'
                );
                // Remove the category from the UI
                $('#category-' + id).remove();
            },
            error: function(xhr, status, error) {
                Swal.fire(
                    'Error!',
                    'Failed to delete category: ' + xhr.responseText,
                    'error'
                );
            }
        });
    }
</script>
