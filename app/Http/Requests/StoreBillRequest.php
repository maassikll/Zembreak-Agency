<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillRequest extends FormRequest
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
            'payment'=> ['required','max:255','string'],
            'amount'=> ['required','regex:/^\d*(\.\d{2})?DZ/'],
            'amount_spend'=> ['nullable','regex:/^\d*(\.\d{2})?DZ/'],
            'file_path'=> ['nullable'],
            'employe_id'=> ['required'],
            'project_id'=> ['required','unique:bills'],
        ];
    }

            /**
 * Get the error messages for the defined validation rules.
 *
 * @return array                            
 */

public function messages(){

    return[
        'payment.required' => 'Payment method is required',
        'amount.required' => 'Project price is required',
        'employe_id.required' => 'The employe is required',
        'project_id.required' => 'The project is required',
        'project_id.unique' => 'This project already associated to another bill !!',
        'amount.regex' => 'Amount must be an integer',
    ];
}



}