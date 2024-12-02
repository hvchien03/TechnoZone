@extends('layout.admin')
@section('title', 'Add New Supplier')
@section('content')
    <div class="w-full bg-gray-200 rounded-sm">
        <p class="text-center mt-10 text-3xl py-8">Add new supplier</p>
        <form class="form mt-10" action="{{ route('categories.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-full p-3 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="name" class="text-base font-semibold mb-4">Category name
                            @if ($errors->has('categoryName'))
                                <span
                                    class="text-red-500 text-danger float-right">{{ $errors->first('categoryName') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" class="w-full rounded-sm h-8 pl-1 form-input" placeholder=""
                                value="{{ old('categoryName') }}" name="categoryName">
                        </div>
                    </div>
                    <div class="h-20 bg-white dark:bg-dark dark:border-gray/20 ">
                        <label for="description" class="text-base font-semibold mb-4">Decription
                            @if ($errors->has('description'))
                                <span
                                    class="text-red-500 text-danger float-right">{{ $errors->first('description') }}</span>
                            @endif
                        </label>
                        <div class="space-y-4">
                            <input type="text" class="w-full rounded-sm h-8 pl-1 form-input" placeholder=""
                                value="{{ old('description') }}" name="description">
                        </div>
                    </div>

                    <button type="submit"
                        class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Save</button>


                </div>
        </form>
    </div>
@endsection
