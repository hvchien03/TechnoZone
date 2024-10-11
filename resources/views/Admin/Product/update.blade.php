@extends('layout.admin')
@section('title', 'Update Product')
@section('content')
    <div class="w-full bg-gray-200 rounded-sm">
        <p class="text-center mt-10 text-3xl py-8">Update product</p>
        <form action="" method="put" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-1/2 p-3">
                    <div class="h-20">
                        <label for="name" class="">Product name
                            @if ($errors->has('productName'))
                                <span class="text-red-500 float-right">{{ $errors->first('productName') }}</span>
                            @endif
                        </label>
                        <div class="mt-2">
                            <input type="text" class="w-full rounded-sm h-8 pl-1" placeholder="" value="{{old('productName')}}" name="productName">
                        </div>
                    </div>
                    <div class="flex h-20">
                        <div class="w-1/2 pr-2">
                            <label for="price" class="">Price
                                @if ($errors->has('price'))
                                    <span class="text-red-500 float-right">{{ $errors->first('price') }}</span>
                                @endif
                            </label>
                            <div class="mt-2">
                                <input type="number" min="0" class="w-full rounded-sm h-8 pl-1" placeholder=""
                                    name="price" value="{{old('price')}}">
                            </div>
                        </div>
                        <div class="w-1/2 pl-2">
                            <div class="h-20">
                                <label for="stock" class="">Stock
                                    @if ($errors->has('stock'))
                                        <span class="text-red-500 float-right">{{ $errors->first('stock') }}</span>
                                    @endif
                                </label>
                                <div class="mt-2">
                                    <input type="number" min="0" class="w-full rounded-sm h-8 pl-1" placeholder=""
                                        name="stock" value="{{old('stock')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex h-20">
                        <div class="w-1/2 pr-2">
                            <div class="h-20">
                                <label for="file_upload" class="">Image
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
                            <label for="warrantyPeriod" class="">Warranty period
                                @if ($errors->has('warrantyPeriod'))
                                    <span class="text-red-500 float-right">{{ $errors->first('warrantyPeriod') }}</span>
                                @endif
                            </label>
                            <div class="mt-2">
                                <input type="number" min="0" class="w-full rounded-sm h-8 pl-1" placeholder=""
                                    name="warrantyPeriod" value="{{old('warrantyPeriod')}}">
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex h-20">
                        <div class="w-1/2 pr-2">
                            <label for="brand_id" class="">Supplier
                                @if ($errors->has('supplierId'))
                                    <span class="text-red-500 float-right">{{ $errors->first('supplierId') }}</span>
                                @endif
                            </label>
                            <div class="mt-2">
                                <select class="w-full rounded-sm h-8" name="brand_id">
                                    <option value="" selected>Select supplier</option>
                                    {{-- @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="w-1/2 pl-2">
                            <div class="h-20">
                                <label for="category_id" class="">Category
                                    @if ($errors->has('categoryId'))
                                        <span class="text-red-500 float-right">{{ $errors->first('categoryId') }}</span>
                                    @endif
                                </label>
                                <div class="mt-2">
                                    <select class="w-full rounded-sm h-8" name="category_id">\
                                        <option value="" selected>Select Category</option>
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 p-3">
                    <div class="h-40">
                        <label for="configuration" class="">Configuration
                            @if ($errors->has('configuration'))
                                <span class="text-red-500 float-right">{{ $errors->first('configuration') }}</span>
                            @endif
                        </label>
                        <div class="mt-2">
                            <textarea class="w-full rounded-sm" rows="5" style="overflow:hidden" placeholder="" name="configuration">{{old('configuration')}}</textarea>
                        </div>
                    </div>
                    <div class="h-40">
                        <label for="warrantyPolicy" class="">Warranty policy
                            @if ($errors->has('warrantyPolicy'))
                                <span class="text-red-500 float-right">{{ $errors->first('warrantyPolicy') }}</span>
                            @endif
                        </label>
                        <div class="mt-2">
                            <textarea class="w-full rounded-sm" rows="5" style="overflow:hidden" placeholder="" name="warrantyPolicy">{{old('warrantyPolicy')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-3">
                <button type="submit" class="w-full bg-blue-500 text-white rounded-sm px-4 py-2">Save</button>
            </div>
        </form>
    </div>
@endsection