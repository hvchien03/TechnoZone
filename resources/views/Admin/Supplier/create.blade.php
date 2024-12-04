@extends('layout.admin')
@section('title', 'Add New Supplier')
@section('content')
    <div class="w-full bg-gray-200 rounded-sm">
        <p class="text-center mt-10 text-3xl py-8">Thêm nhà cung cấp mới</p>
        <form class="form mt-10" action="{{ route('suppliers.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-full p-3 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="name" class="text-base font-semibold mb-4">Nhà cung cấp
                            @if ($errors->has('supplierName'))
                                <span
                                    class="text-red-500 text-danger float-right">{{ $errors->first('supplierName') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" class="w-full rounded-sm h-8 pl-1 form-input" placeholder=""
                                value="{{ old('supplierName') }}" name="supplierName">
                        </div>
                    </div>
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="hotline" class="text-base font-semibold mb-4">Số điện thoại
                            @if ($errors->has('hotline'))
                                <span class="text-red-500 text-danger float-right">{{ $errors->first('hotline') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" class="w-full rounded-sm h-8 pl-1 form-input" placeholder=""
                                value="{{ old('hotline') }}" name="hotline">
                        </div>
                    </div>
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="email" class="text-base font-semibold mb-4">Email
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-danger float-right">{{ $errors->first('email') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" class="w-full rounded-sm h-8 pl-1 form-input" placeholder=""
                                value="{{ old('email') }}" name="email">
                        </div>
                    </div>

                    <button type="submit"
                        class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Tạo mới</button>


                </div>

        </form>
    </div>
@endsection
