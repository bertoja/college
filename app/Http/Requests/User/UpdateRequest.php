<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }


    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:45'],
            'last_name' =>  ['required', 'max:45'],
            'email' =>  ['required', 'email', Rule::unique('users','email')],
            'rut' => ['required','max'],
            'password' =>   ['nullable'],
        ];
    }
}
