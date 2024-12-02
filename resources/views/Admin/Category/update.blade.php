@extends('layout.admin')
@section('title', 'Update Category')
@section('content')
    <div class="w-full bg-gray-200 rounded-sm">
        <p class="text-center mt-10 text-3xl py-8">Update Category</p>
        <form class="form mt-10" action="{{ route('categories.update', $categories->_id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT for update -->
            <div class="flex">
                <div class="w-full p-5 border-2 border-lightgray/10 rounded-lg">
                    <!-- Category Name Input -->
                    <div class="mb-5">
                        <label for="categoryName" class="text-base font-semibold mb-2 block">Category Name</label>
                        <input type="text" id="categoryName" name="categoryName"
                            class="w-full rounded-sm h-8 pl-1 form-input"
                            value="{{ old('categoryName', $categories->categoryName) }}" required>
                        @error('categoryName')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description Input -->
                    <div class="mb-5">
                        <label for="description" class="text-base font-semibold mb-2 block">Description</label>
                        <input type="text" id="description" name="description"
                            class="w-full rounded-sm h-8 pl-1 form-input"
                            value="{{ old('description', $categories->description) }}">
                        @error('description')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
