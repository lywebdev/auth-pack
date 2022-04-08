<?php

namespace App\Http\Requests\Auth;

use App\Rules\Auth\ValidatePasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
{
    private $email;
    private $password;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $this->email = $request->email;
        $this->password = $request->password;

        return true;
    }

    public function messages()
    {
        return [
            'email.required' => 'Введите адрес электронной почты',
            'email.string' => 'Email не является строкой',
            'email.email' => 'Введён некорректный email адрес',
            'email.max' => 'Длина email некорркетная',
            'email.exists' => 'Пользователя с таким email\'ом не существует',

            'password.failed' => 'Некорректный пароль',
            'password.min' => 'Минимальная длина пароля 3 символа',
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
            'email' => 'required|string|email|max:255|exists:users',
            'password' => ['required', 'string', 'min:3', new ValidatePasswordRule([
                'email' => $this->email,
                'password' => $this->password,
            ])],
        ];
    }
}
