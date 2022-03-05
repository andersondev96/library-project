<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.unique' => 'Já existe um usuário com este nome',
            'email.required' => 'O e-mail é obrigatório',
            'email.email' => 'Deve ser no formato de e-mail',
            'email.unique' => 'Este e-mail já está cadastrado',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A sua senha deve possuir no mínimo 8 caracteres',
            'password.confirmed' => 'As senhas não correspondem.',
            'password_confirmation.required' => 'Confirme a sua senha',
            'password_confirmation.min' => 'A sua senha deve possuir no mínimo 8 caracteres',
        ];
    }
}
