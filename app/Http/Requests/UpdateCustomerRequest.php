<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'company' => ['string','max:55'],
            'adress' => ['string','max:255'],
            'category' => ['string','max:255'],
            'person_id' => [Rule::unique('customers')->ignore($this->customer)]
        ];
    }

    public function messages()
    {
        return [
            'person_id' => 'Person_id is already taken'
        ];
    }
}
