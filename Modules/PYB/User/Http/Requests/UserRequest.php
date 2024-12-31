<?php

namespace PYB\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
       return auth()->check()==true;
    }


    public function rules(): array
    {
        return [
            'name'      => 'required|string|min:3|max:190|unique:users,name',
            'email'     => 'required|email|min:3|max:190|unique:users,email',
            'password'  => 'required|string|min:6|max:190',
        ];
    }
}
