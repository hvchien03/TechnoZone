@extends('layout.admin')
@section('title', 'Cập nhật số lượng sản phẩm')
@section('content')
    <div class="w-full bg-gray-200 rounded-sm">
        <p class="text-center mt-10 text-3xl py-8">Cập nhật số lượng</p>
        <table class="min-w-[640px] w-full product-table">
            <thead>
                <tr class="text-left">
                    <th>Sản phẩm</th>
                    <th>Loại</th>
                    <th>Hãng</th>
                    <th>Số lượng</th>
                    <th class="text-end">Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr id="product-{{ $product->id }}">
                        <td>
                            <div class="flex items-center gap-2.5">
                                <img src="{{ asset('images_upload/' . $product->image) }}" class="w-[50px] rounded-lg"
                                    alt="">
                                <div class="flex-1 max-w-[300px] truncate">
                                    <p class="line-clamp-1 truncate">{{ $product->productName }}</p>
                                    <p class="text-gray">Id: #{{ $product->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->Category->categoryName }}</td>
                        <td>{{ $product->Supplier->supplierName }}</td>
                        <td>{{ $product->stock }}</td>
                        <td class="text-end">{{ $product->formaterPriceAttribute() }}
                        </td>
                        <td>
                            <form action="{{ route('products.import') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="number" name="quantity" min="0"
                                    class="w-[80px] rounded-lg border border-gray-300">
                                <button type="submit"
                                    class="hover:underline btn bg-success border border-success rounded-lg text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Lưu
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <style>
            .pagination {
                display: flex;
                /* justify-content: end; */
                margin-top: 20px;
                margin-right: 30px;
            }

            .pagination .pages {
                display: flex;
            }

            .pagination .page-item {
                list-style: none;
                margin: 0 5px;
            }

            .page-link {
                padding: 8px 15px;
                background-color: #f0f0f0;
                border: 1px solid #ddd;
                color: #333;
                text-decoration: none;
                border-radius: 50px;
                font-size: 14px;
                transition: background-color 0.3s, color 0.3s;
                display: inline-block;
                text-align: center;
            }

            .page-link:hover {
                background-color: #007bff;
                color: #fff;
            }

            .page-item.active .page-link {
                background-color: #007bff;
                color: white;
                pointer-events: none;
            }
        </style>
        <div class="pagination">
            {{-- Previous Page Link --}}
            <div class="previous">
                @if ($products->onFirstPage())
                    <button class="page-link" disabled>« Trở về</button>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="page-link">&laquo;
                        Trở về</a>
                @endif
            </div>

            {{-- Pagination Elements --}}
            <div class="pages d-flex flex-row">
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <div class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </div>
                @endforeach
            </div>

            {{-- Next Page Link --}}
            <div class="next float-end">
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="page-link">Tiếp &raquo;</a>
                @else
                    <button class="page-link" disabled>Tiếp &raquo;</button>
                @endif
            </div>
        </div>
    </div>
@endsection
