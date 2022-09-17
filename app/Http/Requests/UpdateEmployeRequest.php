<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeRequest extends FormRequest
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
            'services' => ['min:5','max:30'],
            'person_id'=> [Rule::unique('employes')->ignore($this->employe)]
        ];
    }

    public function messages()
    {
        return [
            'person_id.unique' => 'Person_id is already taken',
        ];
    }
}
