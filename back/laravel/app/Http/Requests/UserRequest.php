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
        if($this->role == "Исполнитель") {
            return [
                'name' => 'required|string',
                'email' => 'required|email|string|unique:users',
                'password' => 'required|string|confirmed|min:3',
                'password_confirmation' => 'required|string',
                'role' => 'required|string',
                'confirmed' => 'required|boolean',
                'surname' => 'required|string',
                'patronymic' => 'required|string',
                'phone' => 'required|numeric|digits:9',
                'additional_phone' => 'required|numeric|digits:9',
                
                'gender' => 'required|string',
                'age' => 'required|date',
                'right_work' => 'required|string',
                'drive' => 'required|string',
                'night_work' => 'required|string',
                'animal_work' => 'required|string',
                'swimming' => 'required|string',
                'about' => 'required|string',
    
                'is_babysitting' => 'nullable|boolean',
                'is_nurse' => 'nullable|boolean',
                'is_housekeeper' => 'nullable|boolean',
    
                'country' => 'required|numeric',
                'city' => 'required|numeric',
                'citizen' => 'required|numeric',
                'criminal' => 'required|numeric',
                'moving' => 'required|numeric',
                'smoking' => 'required|numeric',
                'alcohol' => 'required|numeric',
                'status' => 'required|numeric',
                'religion' => 'required|numeric'
            ];
        } else {
            return [
                'name' => 'required|string',
                'email' => 'required|email|string|unique:users',
                'password' => 'required|string|confirmed|min:3',
                'password_confirmation' => 'required|string',
                'role' => 'required|string',
                'confirmed' => 'required|boolean',
                'surname' => 'required|string',
                'patronymic' => 'required|string',
                'phone' => 'required|numeric|digits:9',
                'additional_phone' => 'required|numeric|digits:9',               
                
                'country' => 'required|numeric',
                'city' => 'required|numeric'                
            ];
        }        
    }

    public function messages() {
        return [
            'name.required' => 'Укажите свое имя.',
            'surname.required' => 'Укажите свою фамилию.',
            'patronymic.required' => 'Укажите свое отчество.',
            'about.required' => 'Напишите немного о себе.',
            'phone.numeric' => 'Номер телефона должен быть числом.',
            'phone.digits' => 'Номер телефона должен содержать 9 цифр.', 
            'additional_phone.numeric' => 'Дополнительный номер телефона должен быть числом.',
            'additional_phone.digits' => 'Дополнительный номер телефона должен содержать 9 цифр.',
            'email.required' => 'Укажите свой email.',
            'email.unique' => 'Адрес электронной почты должен быть уникальным.', 
            'country.required' => 'Укажите страну проживания.',
            'city.required' => 'Укажите свой город.',
            'password.confirmed' => 'Подтверждение пароля указано не корректно.',           
            'password.min' => 'Пароль должен состоять как минимум из 3 символов.',
            'password.required' => 'Укажите свой пароль.',

            'phone.required' => 'Укажите свой номер телефона.',
            'additional_phone.required' => 'Укажите свой дополнительный номер телефона.',
            'gender.required' => 'Укажите свой пол.',
            'age.required' => 'Укажите дату своего рождения.',
            'right_work.required' => 'Укажите право работать на территории Украины.',
            'drive.required' => 'Укажите наличие водительского удостоверения.',
            'night_work.required' => 'Укажите согласие работать в ночное время.',
            'animal_work.required' => 'Укажите готовы ли вы работать в доме с домашними животными.',
            'swimming.required' => 'Укажите умеете ли вы плавать.',

            'citizen.required' => 'Укажите гражданство(страна).',
            'criminal.required' => 'Укажите наличие справки из полиции об отсутствии судимости.',
            'moving.required' => 'Укажите согласны ли вы на переезд.',
            'smoking.required' => 'Укажите отношение к курению.',
            'alcohol.required' => 'Укажите отношение к алкоголю.',
            'status.required' => 'Укажите семейное положение.',
            'religion.required' => 'Укажите свою религию.'
        ];
    }
}
