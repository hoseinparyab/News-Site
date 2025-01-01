<?php

namespace PYB\Advertising\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return  auth()->check()===true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
