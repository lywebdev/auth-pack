<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'Представьтесь, пожалуйста',

            'email.required' => 'Введите адрес электронной почты',
            'email.string' => 'Email не является строкой',
            'email.email' => 'Введён некорректный email адрес',
            'email.max' => 'Длина email некорркетная',
            'email.exists' => 'Пользователя с таким email\'ом не существует',
            'email.unique' => 'Пользователь с таким email\'ом уже существует',

            'password.min' => 'Минимальная длина пароля 6 символов',
            'agreement.accepted' => 'Вы должны быть согласны с политикой обработки персональных данных'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'agreement' => 'accepted'
        ];
    }
}
