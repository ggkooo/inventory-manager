<?php

namespace App\Services\Validation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterValidationService
{
    /**
     * @param array $data
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|min:8|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],
        ], [
            'name.required' => 'O nome completo � obrigat�rio.',
            'name.min' => 'O nome deve ter pelo menos 8 caracteres.',
            'email.required' => 'O e-mail � obrigat�rio.',
            'email.email' => 'Por favor, informe um e-mail v�lido.',
            'email.unique' => 'Este e-mail j� est� sendo utilizado.',
            'password.required' => 'A senha � obrigat�ria.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'As senhas n�o conferem.',
            'password.regex' => 'A senha deve conter pelo menos uma letra mai�scula, uma letra min�scula e um n�mero.'
        ])->validate();
    }
}