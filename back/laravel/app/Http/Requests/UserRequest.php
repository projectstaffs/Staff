<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|string|confirmed|min:3',
            'password_confirmation' => 'required|string',
            'role' => 'required|string',
            'confirmed' => 'required|boolean',
            'surname' => 'required|string',            
            'phone' => 'required|numeric|digits:9',
            
            'gender' => 'required|string',
            'age' => 'required|date',            
            'animal_work' => 'required|string',            
            'about' => 'required|string',

            'is_babysitting' => 'nullable|boolean',
            'is_nurse' => 'nullable|boolean',
            'is_housekeeper' => 'nullable|boolean',
            'country' => 'required|numeric',
            'city' => 'required|numeric'            
        ];
                
    }

    public function messages() {
        return [
            'name.required' => 'Укажите свое имя.',
            'surname.required' => 'Укажите свою фамилию.',            
            'about.required' => 'Напишите немного о себе.',
            'phone.numeric' => 'Номер телефона должен быть числом.',
            'phone.digits' => 'Номер телефона должен содержать 9 цифр.',            
            'email.required' => 'Укажите свой email.',
            'email.unique' => 'Адрес электронной почты должен быть уникальным.', 
            'country.required' => 'Укажите страну проживания.',
            'city.required' => 'Укажите свой город.',
            'password.confirmed' => 'Подтверждение пароля указано не корректно.',           
            'password.min' => 'Пароль должен состоять как минимум из 3 символов.',
            'password.required' => 'Укажите свой пароль.',

            'phone.required' => 'Укажите свой номер телефона.',            
            'gender.required' => 'Укажите свой пол.',
            'age.required' => 'Укажите дату своего рождения.',            
            'animal_work.required' => 'Укажите готовы ли вы работать в доме с домашними животными.'
        ];
    }
}
