<?php

namespace App\Http\Requests\worker;

use Illuminate\Foundation\Http\FormRequest;

class BabyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|numeric',
            'confirmed' => 'required|boolean',
            'baby_exp' => 'required|string',
            'experience_id' => 'required|numeric',
            'recommendation_id' => 'required|numeric',
            'education_about' => 'required|string',
            'workperiod_id' => 'required|numeric',
            'childrencount_id' => 'required|numeric',            
            'employment_id' => 'required|numeric',
            'children_invalid' => 'required|string',
            'hourpay_id' => 'required|numeric',
            'monthpay_id' => 'required|numeric',
            'additional' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'experience_id.required' => 'Укажите свой опыт работы с детьми.',
            'recommendation_id.required' => 'Укажите количество рекомендаций.',
            'workperiod_id.required' => 'Укажите период работы.',
            'childrencount_id.required' => 'Укажите количество детей.',
            'employment_id.required' => 'Укажите занятость.',
            'children_invalid.required' => 'Укажите готовность работать с детьми-инвалидами.',
            'hourpay_id.required' => 'Укажите ожидаемую почасовую оплату.',
            'monthpay_id.required' => 'Укажите ожидаемую помесячную оплату.'
        ];
    }
}
