@extends('layout.admin')
@section('title', 'Admin Page')
@section('content')
    <div class="text-center py-20">
        <h1 class="text-3xl font-bold">List product</h1>
        <a href="{{ route('products.create') }}" class="hover:underline">Add new product</a>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">productName</th>
                    <th scope="col" class="px-6 py-3">price</th>
                    <th scope="col" class="px-6 py-3">configuration</th>
                    <th scope="col" class="px-6 py-3">stock</th>
                    <th scope="col" class="px-6 py-3">categoryId</th>
                    <th scope="col" class="px-6 py-3">supplierId</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center">
                            <img src="{{ asset('images_upload/' . $product->image) }}" alt="{{ $product->productName }}"
                                class="w-10 h-10 mr-2">
                            <p>{{ $product->productName }}</p>
                        </th>
                        <td class="px-6 py-4">{{ $product->formaterPriceAttribute() }}</td>
                        <td class="px-6 py-4">{{ $product->configuration }}</td>
                        <td class="px-6 py-4">{{ $product->stock }}</td>
                        <td class="px-6 py-4">{{ $product->Category->categoryName }}</td>
                        <td class="px-6 py-4">{{ $product->Supplier->supplierName }}</td>
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
@endsection
