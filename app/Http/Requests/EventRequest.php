<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        return [
            "start_date" => ["sometimes","exclude_if:end_date,null","date"],
            "end_date" => ["sometimes","exclude_if:start_date,null","date"],
            "page" => ["nullable","integer","gt:0"],
            "per_page" => ["nullable","integer","gt:0"]
        ];
    }
}
