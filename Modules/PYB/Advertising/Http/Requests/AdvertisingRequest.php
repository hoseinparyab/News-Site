<?php

namespace PYB\Advertising\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PYB\Advertising\Models\Advertising;

class AdvertisingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() === true;
    }

    public function rules()
    {
        $rules= [
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|string|min:3|max:190',
            'title' => 'nullable|string|min:3|max:190',
            'location' => ['required |string',Rule::in(Advertising::$locations)],
        ];
         if (request()->method === 'PATCH') {
            $rules['image'] = 'nullable|file|mimes:jpg,jpeg,png|max:2048';
        }

        return $rules;

    }
}
