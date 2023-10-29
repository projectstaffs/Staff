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
            'title' => 'required|string',
            'title_about' => 'required|string',
            'workperiod_id' => 'required|numeric',
            'employment_id' => 'required|numeric',
            'drive' => 'required|string',
            'agents' => 'required|string',
            'hourpay_id' => 'required|numeric',
            'monthpay_id' => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Укажите Заголовок вакансии.',
            'title_about.required' => 'Опишите вакансию.',
            'workperiod_id.required' => 'Укажите период работы.',
            'employment_id.required' => 'Укажите занятость.',
            'drive.required' => 'Укажите наличие у работника водительского удостоверения.',
            'agents.required' => 'Укажите позволять ли компаниям и агентствам связываться с Вами по данной вакансии.',
            'hourpay_id.required' => 'Укажите ожидаемую почасовую оплату.',
            'monthpay_id.required' => 'Укажите ожидаемую помесячную оплату.'
        ];
    }
}
