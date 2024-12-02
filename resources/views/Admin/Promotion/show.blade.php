@extends('layout.admin')
@section('title', 'Detail Promotion')
@section('content')
    <div class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-5 sm:p-7 space-y-5">
        <!-- Start All Card -->
        <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
            <div class="grid grid-cols-1 gap-5">
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="space-y-[30px]">
                        <div class="flex items-center justify-between flex-wrap gap-5">
                            <div class="p-5 bg-gray/10 rounded-lg">
                                <p class="font-semibold leading-none">Mã #{{ $promotion->id }}</p>
                            </div>
                            <div class="flex sm:flex-row flex-col sm:items-center gap-5 flex-wrap sm:w-1/2 w-full">
                                <div class="space-y-4 flex-1">
                                    <label for="date1" class="text-sm">Ngày bắt đầu
                                    </label>
                                    <input type="date" name="startDate" value="{{ $promotion->startDate }}" readonly
                                        class="form-input rounded-lg" placeholder="Date">
                                </div>
                                <div class="space-y-4 flex-1">
                                    <label for="due1" class="text-sm">Ngày kết thúc
                                    </label>
                                    <input type="date" name="endDate" value="{{ $promotion->endDate }}" readonly
                                        class="form-input rounded-lg" placeholder="Date">
                                </div>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:items-center gap-5 flex-wrap">
                            <div class="space-y-4 flex-1">
                                <label for="promotionName" class="text-sm">Khuyến mãi
                                </label>
                                <input id="promotionName" type="text" class="form-input rounded-lg" name="promotionName"
                                    readonly value="{{ $promotion->promotionName }}" placeholder="Harold Graves">
                            </div>
                            <div class="space-y-4 flex-1">
                                <label class="text-sm">Phần trăm
                                </label>
                                <input type="text" class="form-input rounded-lg" placeholder="15%" name="discount"
                                    readonly value="{{ $promotion->discount }}">
                            </div>
                            <div class="space-y-4 flex-1">
                                <label class="text-sm">Trạng thái
                                </label>
                                <input type="text" class="form-input rounded-lg" name="status" readonly
                                    value="{{ $promotion->status }}">
                            </div>
                        </div>
                        <div class="space-y-4">
                            <label class="text-sm">Chi tiết chương trình
                            </label>
                            <textarea rows="5" class="form-input h-auto rounded-lg resize-none" name="description" readonly
                                placeholder="Your message...">{{ $promotion->description }}</textarea>
                        </div>

                        <div class="space-y-4">
                            <div
                                class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Sản phẩm áp dụng</h2>
                                </h2>
                                <div class="overflow-auto">
                                    <table class="min-w-[640px] w-full product-table">
                                        <thead>
                                            <tr class="text-left">
                                                <th>Id</th>
                                                <th> Sản phẩm</th>
                                                <th>
                                                    Giá
                                                    <svg width="10" height="6" class="inline-block"
                                                        viewBox="0 0 10 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </th>
                                                <th>
                                                    Loại
                                                    <svg width="10" height="6" class="inline-block"
                                                        viewBox="0 0 10 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </th>
                                                <th>
                                                    Nhà cung cấp
                                                    <svg width="10" height="6" class="inline-block"
                                                        viewBox="0 0 10 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr class="text-left">
                                                    <td>#{{ $product->id }}</td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img src="{{ asset('images_upload/' . $product->image) }}"
                                                                class="w-[50px] rounded-full" alt="">
                                                            <p class="line-clamp-1 max-w-[200px] truncate">
                                                                {{ $product->productName }}</p>
                                                        </div>
                                                    </td>
                                                    <td><span
                                                            class="font-bold text-sm py-1.5 px-3 rounded-full">{{ $product->formaterPriceAttribute() }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2">
                                                            <p class="line-clamp-1 max-w-[200px] truncate">
                                                                {{ $product->Category->categoryName }}</p>
                                                        </div>
                                                    </td>
                                                    <td>{{ $product->Supplier->supplierName }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col items-start gap-5 flex-wrap">
                            <div class="flex-1">
                                <a href="{{ route('promotions.index') }}">
                                    <button type="button"
                                        class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Trở về</button>
                                </a>
                                <a href="{{ route('promotions.delete', $promotion->id) }}">
                                    <button
                                        class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10"
                                        x-on:click="
                                            if (toastVisible) {
                                                clearTimeout(toastTimer);
                                                toastTimer = setTimeout(() => toastVisible = false, 3000);
                                            } else {
                                                toastVisible = true;
                                                toastTimer = setTimeout(() => toastVisible = false, 3000);
                                            }
                                            ">
                                        Huỷ
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Card -->
    </div>
@endsection
