@extends('layout.admin')
@section('title', 'Update Supplier')
@section('content')
    <div class="w-full bg-gray-200 rounded-sm">
        <p class="text-center mt-10 text-3xl py-8">Update Supplier</p>
        <form class="form mt-10" action="{{ route('suppliers.update', $supplier->_id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Thêm phương thức PUT -->
            <div class="flex">
                <div class="w-full p-3 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="supplierName" class="text-base font-semibold mb-4">Supplier Name
                            @if ($errors->has('supplierName'))
                                <span
                                    class="text-red-500 text-danger float-right">{{ $errors->first('supplierName') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" id="supplierName" class="w-full rounded-sm h-8 pl-1 form-input"
                                value="{{ old('supplierName', $supplier->supplierName) }}" name="supplierName">
                        </div>
                    </div>
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="hotline" class="text-base font-semibold mb-4">Hotline
                            @if ($errors->has('hotline'))
                                <span class="text-red-500 text-danger float-right">{{ $errors->first('hotline') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" id="hotline" class="w-full rounded-sm h-8 pl-1 form-input"
                                value="{{ old('hotline', $supplier->hotline) }}" name="hotline">
                        </div>
                    </div>
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="email" class="text-base font-semibold mb-4">Email
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-danger float-right">{{ $errors->first('email') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" id="email" class="w-full rounded-sm h-8 pl-1 form-input"
                                value="{{ old('email', $supplier->email) }}" name="email">
                        </div>
                    </div>

                    <button type="submit"
                        class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
