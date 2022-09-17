<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            'first_name' => ['required', 'max:55','string'],
            'last_name' => ['required', 'max:55','string'],
            'email' => ['required','max:255','email:spoof,strict','unique:people'],
            'phone' =>['required','numeric','unique:people','digits:10'],
            'adress' => ['required','max:255','string'],

        ];
    }

        /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */

public function messages(){

    return[
        'first_name.required' => 'First_name is required',
        'last_name.required' => 'Lirst_name is required',
        'email.required' => 'Email is required',
        'phone.required' => 'Phone is required',
        'adress.required' => 'Adress is required',
        'email.unique' => 'Email already taken',
        'phone.unique' => 'Phone number already taken',
        'phone.digit' => 'Phone number must not exceed 10 digits',
        'email.email' => 'the field must be an email adress',
    ];
    
}
}
