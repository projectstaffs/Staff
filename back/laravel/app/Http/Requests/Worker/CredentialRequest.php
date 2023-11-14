<?php

namespace App\Http\Requests\worker;

use Illuminate\Foundation\Http\FormRequest;

class CredentialRequest extends FormRequest
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
            'full_name' => 'required|string',
            'phone' => 'required|numeric|digits:9',
            'email' => 'required|email|string',
            'content' => 'required|string',
            'user_id' => 'required'                
        ];
    }

    public function messages() {
        return [
            'full_name.required' => 'Укажите ФИО рекомендателя.',
            'phone.required' => 'Укажите номер телефона рекомендателя.',
            'phone.numeric' => 'Номер телефона должен быть числом.',
            'phone.digits' => 'Номер телефона должен содержать 9 цифр.',
            'email.required' => 'Укажите электронный адрес рекомендателя.',
            'content.required' => 'Укажите комментарии по рекомендации.'
        ];
    }
}
