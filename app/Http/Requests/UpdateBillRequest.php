<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBillRequest extends FormRequest
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
            'payment'=> ['max:255','string'],
            'amount'=> ['regex:/^\d*(\.\d{2})?DZ/'],
            'amount_spend'=> ['nullable','regex:/^\d*(\.\d{2})?DZ/'],
            'file_path'=> ['nullable'],
            'employe_id'=> [],
            'project_id'=> [Rule::unique('bills')->ignore($this->bill)],
        ];
    }

    public function messages(){
        return [
          'project_id.unique' => 'sorry but the project_id is already taken',
          'amount.regex' => 'Amount must be an integer',   
        ];
    }
}
