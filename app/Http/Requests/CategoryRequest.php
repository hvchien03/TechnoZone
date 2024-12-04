<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //Cấp quyền cho admin sử dụng CategoryRequest, ngược lại không cho phép
        if (Auth::user()->role === 'admin') {
            return true;
        }
        return false;
        // return true trước để làm mẫu, sau khi đăng nhập thì sửa lại cho phù hợp
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
            'categoryName' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ];
    }
}