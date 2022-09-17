<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'name' => ['required','max:55','string'],
            'description' =>['required','min:8','max:255','string'],
        ];
    }

    public function messages(){
        return[
            'name.required' => 'A name is required',
            'description.required' => 'A description is required',
            'description.min' => 'Description must have more than 8 characters', 
        ];
    }
}
