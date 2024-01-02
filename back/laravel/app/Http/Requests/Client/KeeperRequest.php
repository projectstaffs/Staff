<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class KeeperRequest extends FormRequest
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
            'title_about' => 'required',
            'workperiod_id' => 'required|numeric',
            'hourpay_id' => 'required|numeric',
            'monthpay_id' => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'title_about.required' => '{"en":"Describe the vacancy.","ua":"Опишіть вакансію."}',
            'workperiod_id.required' => '{"en":"Enter the period of work.","ua":"Вкажіть період роботи."}',
            'hourpay_id.required' => '{"en":"Indicate the expected hourly rate.","ua":"Вкажіть очікувану погодинну оплату."}',
            'monthpay_id.required' => '{"en":"Indicate the expected monthly payment.","ua":"Вкажіть очікувану помісячну оплату."}'
        ];
    }
}
