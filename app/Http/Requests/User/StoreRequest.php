<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:45'],
            'last_name' =>  ['required', 'max:45'],
            'email' =>  ['required', 'email', 'unique:users,email'],
            'rut' => ['required','unique:users,rut', 'max:10'],
            'password' => ['required','min:8'],
        ];
    }
}
