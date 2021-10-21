<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequestAdd extends FormRequest
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
            "name" => ["bail","required","string","max:150"],
            "category_id" => ["bail","required","exists:categories,id"],
            "num_of_tickets" => ["bail","required","integer","gte:0","max:5"]
        ];
    }
}
