<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cho phép tất cả người dùng gửi yêu cầu này, 
        // bạn có thể tùy chỉnh để kiểm tra quyền hạn người dùng nếu cần
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
            'supplierName' => 'required|string|max:255',
            'hotline' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ];
    }
}