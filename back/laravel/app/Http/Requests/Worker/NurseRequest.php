<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class NurseRequest extends FormRequest
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
            'nurse_exp' => 'required',
            'experience_id' => 'required|numeric',
            'workperiod_id' => 'required|numeric',
            'hourpay_id' => 'required|numeric',
            'monthpay_id' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'nurse_exp.required' => 'Опишите Ваш опыт работы с пристарелыми.',
            'experience_id.required' => 'Укажите свой опыт работы с пристарелыми.',
            'workperiod_id.required' => '{"en":"Enter the period of work.","ua":"Вкажіть період роботи."}',
            'hourpay_id.required' => '{"en":"Indicate the expected hourly rate.","ua":"Вкажіть очікувану погодинну оплату."}',
            'monthpay_id.required' => '{"en":"Indicate the expected monthly payment.","ua":"Вкажіть очікувану помісячну оплату."}'
        ];
    }
}
