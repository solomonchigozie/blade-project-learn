<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image'=>['nullable','image','max:3000',''],
            'firstname'=>['required','max:255','string'],
            'lastname'=>['required','max:255','string'],
            'email'=>['required','email'],
            'phone'=>['required','string'],
            'accountnumber'=>['required','numeric'],
            'about'=>['required','string','max:500'],
        ];
    }
}
