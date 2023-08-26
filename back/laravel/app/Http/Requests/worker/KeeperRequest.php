<?php

namespace App\Http\Requests\worker;

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
            'keeper_exp' => 'required|string',
            'experience_id' => 'required|numeric',
            'recommendation_id' => 'required|numeric',
            'workperiod_id' => 'required|numeric',           
            'employment_id' => 'required|numeric',            
            'technique' => 'required|string',
            'material' => 'required|string',
            'baby_keeper' => 'required|string',
            'nurse_keeper' => 'required|string',            
            'hourpay_id' => 'required|numeric',
            'monthpay_id' => 'required|numeric',
            'additional' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'experience_id.required' => 'Укажите свой опыт работы по дому.',
            'recommendation_id.required' => 'Укажите количество рекомендаций.',
            'workperiod_id.required' => 'Укажите период работы.',
            'employment_id.required' => 'Укажите занятость.',
            'technique.required' => 'Укажите можете ли Вы обеспечить собственную технику для уборки.',
            'material.required' => 'Укажите можете ли Вы обеспечить собственные средства для уборки.',
            'baby_keeper.required' => 'Укажите можете ли Вы присматривать за детьми.',
            'nurse_keeper.required' => 'Укажите можете ли Вы присматривать за пристарелыми.',
            'hourpay_id.required' => 'Укажите ожидаемую почасовую оплату.',
            'monthpay_id.required' => 'Укажите ожидаемую помесячную оплату.'
        ];
    }
}
