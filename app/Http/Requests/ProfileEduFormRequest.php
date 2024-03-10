<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEduFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        
                    return [
                        "entrance_year" => "required",
                        "entrance_month" => "required",
                        "pass_year" => "required",
                        "pass_month" => "required",
                        "institution_name" => "required",
                        "degree_level_id" => "required",
                    ];
                
    }

    public function messages()
    {
        return [
            'degree_level_id.required' => 'Please select degree level.',
            'institution_name.required' => 'Please Enter Institute Name.',
            'pass_month.required' => 'Please enter passing month.',
            'pass_year.required' => 'Please enter passing year.',
            'entrance_month.required' => 'Please enter entry month.',
            'entrance_year.required' => 'Please enter entry year.'
        ];
    }
}
