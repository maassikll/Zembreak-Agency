<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'estimed_date'=> ['date_format:d/m/Y','min:8'],
            'infos'=>['min:5','max:255','string'],
            'customer_id'=> [/*Rule::unique('projects')->ignore($this->project)*/],
            'service_id'=> [/*Rule::unique('projects')->ignore($this->project)*/],
        ];
    }
}
