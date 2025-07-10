<?php

namespace App\Services\Validation;

use Illuminate\Support\Facades\Validator;

class LoginValidationService
{
    /**
     * @param array $data
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ], [
            'email.required' => 'The email is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password is required.',
        ])->validate();
    }
}