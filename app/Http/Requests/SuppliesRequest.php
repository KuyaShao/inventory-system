<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliesRequest extends FormRequest
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
            'request_office'=>'required|max:255',
            'purpose'=>'required|max:255'
        ];
    }

    public function messages()
    {
        return[
            'request_office.required'=>':attribute has required please fill it up!',
            'purpose.required'=>':attribute has required please fill it up'
        ];
    }
}
