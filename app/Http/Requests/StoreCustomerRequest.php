<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'company' => ['required','max:55','string'],
            'adress' => ['required','max:255','string'],
            'category' => ['required','max:255','string'],
            'person_id' => ['required','unique:customers'],
        ];
    }

    public function messages(){

        return [
            'company.required' =>'Company name is required',
            'adress.required' => 'Adress is required',
            'category.required' => 'Catergory is required',
            'person_id.required' => 'Person_id is required',
            'person_id.unique' => 'Person_id is already taken',
        ];
    }
}
