<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'estimed_date'=> ['required','date_format:d/m/Y'],
            'infos'=>['required','max:255'],
            'customer_id'=> ['required'],
            'service_id'=> ['required'],
        ];
    }

    public function messages(){
        return[
            'estimed_date.required' => 'Estimate date is required',
            'infos.required' => 'infos is required',
            'customer_id.required' => 'a customer_id is required',
            'service_id.required' => 'a service_id is required', 
            
        ];
    }
}
