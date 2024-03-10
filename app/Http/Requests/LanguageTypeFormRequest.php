<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LanguageTypeFormRequest extends Request
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
                        "id" => "", "lang_id" => "required", "eng_title" => "required", "jp_title" => "required"
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            "id" => "", "lang_id" => "required", "eng_title" => "required", "jp_title" => "required"
        ];
    }

}