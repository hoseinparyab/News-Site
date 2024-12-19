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
            //
        ];
    }
}
