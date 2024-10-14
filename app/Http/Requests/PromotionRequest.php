<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            // Quy tắc cho phương thức POST
            return [
                'promotionName' => 'required',
                'description' => 'required',
                'discount' => 'required|numeric',
                'startDate' => 'required|date|before_or_equal:endDate',
                'endDate' => 'required|date|after_or_equal:startDate',
                'status' => 'required',
                'products' => 'required',
            ];
        } elseif ($this->isMethod('patch')) {
            // Điều kiện kiểm tra để chọn nhóm validate nào
            $formName = $this->input('name');
            if ($formName === 'part1') {
                return $this->patchRulesPart1();
            } else if ($formName === 'part2') {
                return $this->patchRulesPart2();
            }
        }
        return [];
    }
    private function patchRulesPart1(): array
    {
        return [
            'promotionName' => 'required',
            'description' => 'required',
            'discount' => 'required|numeric',
            'startDate' => 'required|date|before_or_equal:endDate',
            'endDate' => 'required|date|after_or_equal:startDate',
            'status' => 'required',
        ];
    }

    private function patchRulesPart2(): array
    {
        return [
            'products' => 'required',
        ];
    }
}
