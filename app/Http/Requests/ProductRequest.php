<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // cấp quyền cho admin dùng product request, ngược lại thì không cho phép
        // if (Auth::user()->role === 'admin') {
        //     return true;
        // }
        // return false;
        //return true trước để làm mẫu đã, đăng nhập r thì sửa lại
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'productName' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'supplierId' => 'required',
            'categoryId' => 'required',
            'configuration' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'warrantyPeriod' => 'required|integer|min:1',
            'warrantyPolicy' => 'required|string',
        ];
    }
}