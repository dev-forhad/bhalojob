<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrivingCategoryFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
            case 'POST': {
                    $id = (int) $this->input('id', 0);
                    return [
                        "id" => "", "class_id" => "required", "eng_title" => "required", "jp_title" => ""
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            "id" => "", "class_id" => "required", "eng_title" => "required", "jp_title" => ""
        ];
    }
}
