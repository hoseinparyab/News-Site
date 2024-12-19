<?php

namespace PYB\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return auth()->check() === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|min:3|max:190',
            'email'     => 'required|email|min:3|max:190|unique:users,email,' . request()->id,
            'password'  => 'nullable|string|min:6|max:190',
        ];
    }
}
