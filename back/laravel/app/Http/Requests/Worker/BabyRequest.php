<?php

namespace App\Http\Requests\Worker;

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
            'baby_exp' => 'required',
            'experience_id' => 'required|numeric',
            'workperiod_id' => 'required|numeric',
            'childrencount_id' => 'required|numeric',
            'children_invalid' => 'required',
            'hourpay_id' => 'required|numeric',
            'monthpay_id' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'baby_exp.required' => '{"en":"Describe your experience of working with children.","ua":"Опишіть Ваш досвід роботи з дітьми."}',
            'experience_id.required' => '{"en":"Please describe your experience working with children.","ua":"Вкажіть свій досвід роботи з дітьми."}',
            'workperiod_id.required' => '{"en":"Enter the period of work.","ua":"Вкажіть період роботи."}',
            'childrencount_id.required' => '{"en":"Enter the number of children.","ua":"Вкажіть кількість дітей."}',
            'children_invalid.required' => '{"en":"Indicate your willingness to work with children with disabilities.","ua":"Вкажіть готовність працювати з дітьми-інвалідами."}',
            'hourpay_id.required' => '{"en":"Indicate the expected hourly rate.","ua":"Вкажіть очікувану погодинну оплату."}',
            'monthpay_id.required' => '{"en":"Indicate the expected monthly payment.","ua":"Вкажіть очікувану помісячну оплату."}'
        ];
    }
}
