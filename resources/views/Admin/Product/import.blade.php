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
                            <a href="{{ route('products.update', ['id' => $product->id]) }}"
                                class="hover:underline btn bg-success border border-success rounded-lg text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Chỉnh
                                sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
