<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => [ 'max:55','string'],
            'last_name' => [ 'max:55','string'],
            'email' => ['max:255','email:spoof,strict',Rule::unique('people')->ignore($this->person)],
            'phone' =>['numeric','digits:10',Rule::unique('people')->ignore($this->person)],
            'adress' => ['max:255','string'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email is already taken',
            'phone.unique' => 'Phone is already taken',
            'phone.digit' => 'Phone number must not exceed 10 digits',
            'email.email' => 'the field must be an email adress',
        ];
    }


}
