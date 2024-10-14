@extends('layout.admin')
@section('title', 'Create Promotion')
@section('content')
    <div class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-5 sm:p-7 space-y-5">
        <!-- Start All Card -->
        <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
            <div class="grid grid-cols-1 gap-5">
                <div>
                    <p class="font-semibold">Create New Promotion</p>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <form action="{{ route('promotions.create') }}" method="post" class="space-y-[30px]">
                        @csrf
                        <div class="flex items-center justify-between flex-wrap gap-5">
                            <div class="p-5 bg-gray/10 rounded-lg">
                                <p class="font-semibold leading-none">Promotion</p>
                            </div>
                            <div class="flex sm:flex-row flex-col sm:items-center gap-5 flex-wrap sm:w-1/2 w-full">
                                <div class="space-y-4 flex-1">
                                    <label for="date1" class="text-sm">Start
                                        @if ($errors->has('startDate'))
                                            <span class="text-danger text-sm">{{ $errors->first('startDate') }}</span>
                                        @endif
                                    </label>
                                    <input type="date" name="startDate" value="{{ old('startDate') }}"
                                        class="form-input rounded-lg" placeholder="Date">
                                </div>
                                <div class="space-y-4 flex-1">
                                    <label for="due1" class="text-sm">End
                                        @if ($errors->has('endDate'))
                                            <span class="text-danger text-sm">{{ $errors->first('endDate') }}</span>
                                        @endif
                                    </label>
                                    <input type="date" name="endDate" value="{{ old('endDate') }}"
                                        class="form-input rounded-lg" placeholder="Date">
                                </div>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:items-center gap-5 flex-wrap">
                            <div class="space-y-4 flex-1">
                                <label for="promotionName" class="text-sm">Promotion name
                                    @if ($errors->has('promotionName'))
                                        <span class="text-danger text-sm">{{ $errors->first('promotionName') }}</span>
                                    @endif
                                </label>
                                <input id="promotionName" type="text" class="form-input rounded-lg" name="promotionName"
                                    value="{{ old('promotionName') }}" placeholder="Harold Graves">
                            </div>
                            <div class="space-y-4 flex-1">
                                <label class="text-sm">Discount
                                    @if ($errors->has('discount'))
                                        <span class="text-danger text-sm">{{ $errors->first('discount') }}</span>
                                    @endif
                                </label>
                                <input type="text" class="form-input rounded-lg" placeholder="15%" name="discount"
                                    value="{{ old('discount') }}">
                            </div>
                            <div class="space-y-4 flex-1">
                                <label class="text-sm">Status
                                    @if ($errors->has('status'))
                                        <span class="text-danger text-sm">{{ $errors->first('status') }}</span>
                                    @endif
                                </label>
                                <select name="status" class="form-select rounded-lg">
                                    <option value="Not started yet" selected>Not started yet</option>
                                    <option value="Is happening">Is happening</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <label class="text-sm">Desriptions
                                @if ($errors->has('description'))
                                    <span class="text-danger text-sm">{{ $errors->first('description') }}</span>
                                @endif
                            </label>
                            <textarea rows="5" class="form-input h-auto rounded-lg resize-none" name="description"
                                placeholder="Your message...">{{old('description')}}</textarea>
                        </div>

                        <div class="space-y-4">
                            <div
                                class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                                <h2 class="text-base font-semibold mb-4">Products
                                    @if ($errors->has('products'))
                                        <span class="text-danger text-sm">{{ $errors->first('products') }}</span>
                                    @endif
                                </h2>
                                <div class="overflow-auto">
                                    <table class="min-w-[640px] w-full product-table">
                                        <thead>
                                            <tr class="text-left">
                                                <th>
                                                    <input type="checkbox" class="form-checkbox">
                                                </th>
                                                <th>Id</th>
                                                <th> product</th>
                                                <th>
                                                    price
                                                    <svg width="10" height="6" class="inline-block"
                                                        viewBox="0 0 10 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </th>
                                                <th>
                                                    category
                                                    <svg width="10" height="6" class="inline-block"
                                                        viewBox="0 0 10 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </th>
                                                <th>
                                                    supplier
                                                    <svg width="10" height="6" class="inline-block"
                                                        viewBox="0 0 10 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr class="text-left">
                                                    <td>
                                                        <input type="checkbox" class="form-checkbox" name="products[]"
                                                            value="{{ $product->id }}">
                                                    </td>
                                                    <td>#{{ $product->id }}</td>
                                                    <td>
                                                        <div class="flex items-center gap-2.5">
                                                            <img src="{{ asset('images_upload/' . $product->image) }}"
                                                                class="w-[50px] rounded-full" alt="">
                                                            <p class="line-clamp-1 max-w-[200px] truncate">
                                                                {{ $product->productName }}</p>
                                                        </div>
                                                    </td>
                                                    <td><span
                                                            class="bg-primary text-white font-bold text-sm py-1.5 px-3 rounded-full">{{ $product->formaterPriceAttribute() }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="flex items-center gap-2">
                                                            <p class="line-clamp-1 max-w-[200px] truncate">
                                                                {{ $product->Category->categoryName }}</p>
                                                        </div>
                                                    </td>
                                                    <td>{{ $product->Supplier->supplierName }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="flex sm:flex-row flex-col items-start gap-5 flex-wrap">
                            <div class="flex-1">
                                <a href="{{ route('promotions.index') }}">
                                    <button type="button"
                                        class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Cancel</button>
                                </a>
                            </div>
                            <div class="flex-1 max-w-[358px] flex justify-end items-center gap-2.5 flex-wrap">
                                <button type="button submit"
                                    class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End All Card -->
    </div>
@endsection
