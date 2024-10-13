@extends('layout.admin')
@section('title', 'Admin Page')
@section('content')
    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1">
            <div>
                <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                    <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                        <a href="javaScript:;">Tables</a>
                        <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5"
                                d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                                fill="currentColor" />
                        </svg>
                    </li>
                    <li>List Product</li>
                </ul>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-5">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="text-base font-semibold mb-4"><a href="{{ route('products.create') }}"
                        class="hover:underline btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Add
                        new product</a></h2>
                <div class="overflow-auto">
                    <table class="min-w-[640px] w-full product-table">
                        <thead>
                            <tr class="text-left">
                                <th>product</th>
                                <th>category</th>
                                <th>supplier</th>
                                <th>stock</th>
                                <th>price</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-2.5">
                                            <img src="{{ asset('images_upload/' . $product->image) }}"
                                                class="w-[50px] rounded-full" alt="">
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
                                            class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">{{ $product->formaterPriceAttribute() }}</span>
                                    </td>
                                    <td>
                                        <a href="" class="hover:underline px-1">Show</a>
                                        <a href="" class="hover:underline px-1">Edit</a>
                                        <a href="" class="hover:underline px-1">Delete</a>
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
