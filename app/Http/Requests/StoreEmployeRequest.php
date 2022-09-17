<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
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
            'services' => ['required','max:55','string'],
            'person_id'=> ['required','unique:employes']
        ];
    }

    public function messages()
    {

        return[
            'services.required' => 'Please tell us what is the services can you propose ',
            'person_id ' => 'Person_id is required',
            'person_id.unique' => 'Person_id is already taken'
        ];
    }
}
