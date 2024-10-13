@extends('layout.admin')
@section('title', 'Add New Product')
@section('content')
    <div class="w-full bg-gray-200 rounded-sm">
        <p class="text-center mt-10 text-3xl py-8">Add new product</p>
        <form class="form mt-10" action="{{ route('products.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-1/2 p-3 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="name" class="text-base font-semibold mb-4">Product name
                            @if ($errors->has('productName'))
                                <span class="text-red-500 float-right">{{ $errors->first('productName') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" class="w-full rounded-sm h-8 pl-1 form-input" placeholder=""
                                value="{{ old('productName') }}" name="productName">
                        </div>
                    </div>
                    <div class="flex h-20">
                        <div class="w-1/2 pr-2">
                            <label for="price" class="text-base font-semibold mb-4">Price
                                @if ($errors->has('price'))
                                    <span class="text-red-500 float-right">{{ $errors->first('price') }}</span>
                                @endif
                            </label>
                            <div class="mt-2">
                                <input type="number" min="0" class="w-full rounded-sm h-8 pl-1 form-input"
                                    placeholder="" name="price" value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="w-1/2 pl-2">
                            <div class="h-20">
                                <label for="stock" class="text-base font-semibold mb-4">Stock
                                    @if ($errors->has('stock'))
                                        <span class="text-red-500 float-right">{{ $errors->first('stock') }}</span>
                                    @endif
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="0" class="w-full rounded-sm h-8 pl-1 form-input"
                                        placeholder="" name="stock" value="{{ old('stock') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex h-20">
                        <div class="w-1/2 pr-2">
                            <div class="h-20">
                                <label for="file_upload" class="text-base font-semibold mb-4">Image
                                    @if ($errors->has('image'))
                                        <span class="text-red-500 float-right">{{ $errors->first('image') }}</span>
                                    @endif
                                </label>
                                <div class="mt-2">
                                    <input type="file"
                                        class="
                                    block w-full text-sm text-slate-500
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-sm file:border-0
                  file:text-sm file:font-semibold
                  file:bg-violet-50 file:text-violet-700
                  hover:file:bg-violet-100"
                                        name="image">
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 pl-2">
                            <label for="warrantyPeriod" class="text-base font-semibold mb-4">Warranty period
                                @if ($errors->has('warrantyPeriod'))
                                    <span class="text-red-500 float-right">{{ $errors->first('warrantyPeriod') }}</span>
                                @endif
                            </label>
                            <div class="mt-2">
                                <input type="number" min="0" class="w-full rounded-sm h-8 pl-1 form-input"
                                    placeholder="" name="warrantyPeriod" value="{{ old('warrantyPeriod') }}">
                            </div>
                        </div>

                    </div>
                    <div class="flex h-20">
                        <div class="w-1/2 pr-2">
                            <label for="brand_id" class="text-base font-semibold mb-4">Supplier
                                @if ($errors->has('supplierId'))
                                    <span class="text-red-500 float-right">{{ $errors->first('supplierId') }}</span>
                                @endif
                            </label>
                            <div class="mt-2">
                                <select class="w-full rounded-sm h-10 form-select" name="supplierId">
                                    <option value="" selected>Select supplier</option>
                                    @foreach ($supp as $s)
                                        <option value="{{ $s->id }}">{{ $s->supplierName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-1/2 pl-2">
                            <div class="h-20">
                                <label for="category_id" class="text-base font-semibold mb-4">Category
                                    @if ($errors->has('categoryId'))
                                        <span class="text-red-500 float-right">{{ $errors->first('categoryId') }}</span>
                                    @endif
                                </label>
                                <div class="mt-2">
                                    <select class="w-full rounded-sm h-10 form-select" name="categoryId">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($cate as $c)
                                            <option value="{{ $c->id }}">{{ $c->categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 p-3 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="h-40">
                        <label for="configuration" class="text-base font-semibold mb-4">Configuration
                            @if ($errors->has('configuration'))
                                <span class="text-red-500 float-right">{{ $errors->first('configuration') }}</span>
                            @endif
                        </label>
                        <div class="mt-2">
                            <textarea class="w-full rounded-sm p-2 form-input" rows="4" style="overflow:hidden" placeholder=""
                                name="configuration">{{ old('configuration') }}</textarea>
                        </div>
                    </div>
                    <div class="h-40">
                        <label for="warrantyPolicy" class="text-base font-semibold mb-4">Warranty policy
                            @if ($errors->has('warrantyPolicy'))
                                <span class="text-red-500 float-right">{{ $errors->first('warrantyPolicy') }}</span>
                            @endif
                        </label>
                        <div class="mt-2">
                            <textarea class="w-full rounded-sm p-2 form-input" rows="4" style="overflow:hidden" placeholder=""
                                name="warrantyPolicy">{{ old('warrantyPolicy') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-3">
                <button type="submit"
                    class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Save</button>
            </div>
        </form>
    </div>
@endsection
