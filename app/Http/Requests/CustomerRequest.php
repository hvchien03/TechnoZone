<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'phone' => 'required|string|regex:/^0\d{9}$/',
            'email' => 'required|email:rfc,dns|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[com]+$/',
            'address' => 'required|string|max:255'
        ];
    }
    public function messages(): array
    {
        return [
            'name.max' => 'Tên không được vượt quá 50 ký tự.',
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Định dạng số điện thoại không hợp lệ.',
            'email.regex' => 'Định dạng email không hợp lệ.',
            'email.required' => 'Vui lòng nhập email.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'address.required' => 'Vui lòng nhập địa chỉ.'
        ];
    }
}
