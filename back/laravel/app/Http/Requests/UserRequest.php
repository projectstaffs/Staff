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
            'name' => 'required',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|string|confirmed|min:3',
            'password_confirmation' => 'required|string',
            'role' => 'required|string',
            'confirmed' => 'required|boolean',
            'surname' => 'required',            
            'phone' => 'required|numeric|digits:9',
            'phone_code' => 'required',
            
            'gender' => 'required',
            'age' => 'required',            
            'animal_work' => 'required',            
            'about' => 'required',
            
            'country' => 'required|numeric',
            'city' => 'required|numeric'            
        ];                
    }

    public function messages() {
        return [
            'name.required' => '{"en":"Enter your name.","ua":"Вкажіть своє ім’я."}',
            'surname.required' => '{"en":"Enter your surname.","ua":"Вкажіть своє прізвище."}',            
            'about.required' => '{"en":"Write a little about yourself.","ua":"Напишіть трохи про себе."}',
            'phone.numeric' => '{"en":"The phone number must be a number.","ua":"Номер телефону має бути числом."}',
            'phone.digits' => '{"en":"The phone number must contain 9 digits.","ua":"Номер телефону має містити 9 цифр."}',            
            'email.required' => '{"en":"Enter your email.","ua":"Вкажіть свій email."}',
            'email.unique' => '{"en":"The email address must be unique.","ua":"Адреса електронної пошти має бути унікальною."}', 
            'country.required' => '{"en":"Specify your country of residence.","ua":"Вкажіть країну проживання."}',
            'phone_code.required' => '{"en":"Enter country code.","ua":"Вкажіть код країни."}',
            'city.required' => '{"en":"Enter your city.","ua":"Вкажіть своє місто."}',
            'password.confirmed' => '{"en":"The password confirmation is incorrect.","ua":"Підтвердження пароля вказано некоректно."}',           
            'password.min' => '{"en":"The password must consist of at least 3 characters.","ua":"Пароль має складатися щонайменше з 3 символів."}',
            'password.required' => '{"en":"Enter your password.","ua":"Вкажіть свій пароль."}',

            'phone.required' => '{"en":"Enter your phone number.","ua":"Вкажіть свій номер телефону."}',            
            'gender.required' => '{"en":"Please indicate your gender.","ua":"Вкажіть свою стать."}',
            'age.required' => '{"en":"Enter your date of birth.","ua":"Вкажіть дату свого народження."}',            
            'animal_work.required' => '{"en":"Indicate whether you are ready to work in a house with pets.","ua":"Вкажіть чи готові ви працювати в будинку з домашніми тваринами."}'
        ];
    }
}
