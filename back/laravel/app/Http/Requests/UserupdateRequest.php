<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserupdateRequest extends FormRequest
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
                'email' => 'required|email|string|unique:users,email,' . $this->id,
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
    
                'country_id' => 'required|numeric',
                'city_id' => 'required|numeric',
                'citizen_id' => 'required|numeric',
                'criminal_id' => 'required|numeric',
                'moving_id' => 'required|numeric',
                'smoking_id' => 'required|numeric',
                'alcohol_id' => 'required|numeric',
                'status_id' => 'required|numeric',
                'religion_id' => 'required|numeric'
            ];
        } else {
            return [
                'name' => 'required|string',
                'email' => 'required|email|string|unique:users,email,' . $this->id,
                'password' => 'required|string|confirmed|min:3',
                'password_confirmation' => 'required|string',
                'role' => 'required|string',
                'confirmed' => 'required|boolean',
                'surname' => 'required|string',
                'patronymic' => 'required|string',
                'phone' => 'required|numeric|digits:9',
                'additional_phone' => 'required|numeric|digits:9',               
                
                'country_id' => 'required|numeric',
                'city_id' => 'required|numeric'                
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
            'country_id.required' => 'Укажите страну проживания.',
            'city_id.required' => 'Укажите свой город.',
            'password.confirmed' => 'Подтверждение пароля указано не корректно.',           
            'password.min' => 'Пароль должен состоять как минимум из 3 символов.',
            'password.required' => 'Укажите свой пароль.',

            'gender.required' => 'Укажите свой пол.',
            'age.required' => 'Укажите дату своего рождения.',
            'right_work.required' => 'Укажите право работать на территории Украины.',
            'drive.required' => 'Укажите наличие водительского удостоверения.',
            'night_work.required' => 'Укажите согласие работать в ночное время.',
            'animal_work.required' => 'Укажите готовы ли вы работать в доме с домашними животными.',
            'swimming.required' => 'Укажите умеете ли вы плавать.',

            'citizen_id.required' => 'Укажите гражданство(страна).',
            'criminal_id.required' => 'Укажите наличие справки из полиции об отсутствии судимости.',
            'moving_id.required' => 'Укажите согласны ли вы на переезд.',
            'smoking_id.required' => 'Укажите отношение к курению.',
            'alcohol_id.required' => 'Укажите отношение к алкоголю.',
            'status_id.required' => 'Укажите семейное положение.',
            'religion_id.required' => 'Укажите свою религию.'
        ];
    }
}
