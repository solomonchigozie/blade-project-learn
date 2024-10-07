<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','min:5'],
            'email'=>['required','email','max:40']
        ];
    }

    function messages()
    {
        return [
            'name.required'=>'Hey, please fill the name field',
            'name.min'=>'The name is too short, put your real name',
            'email.required'=>'please fill in an email address'
        ];
    }
}
