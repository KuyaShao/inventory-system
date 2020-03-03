<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
            //
            'roles'=>'required',
            'name'=>'required',
            'email'=>'email|required',
            'password'=>''

        ];

    }

    public function messages()
    {
        return[
            'name.required'=>':attribute was required please fill it up!',
            'email.email'=>':attribute need to be valid email address',
            'roles.required'=>':attribute was required please fill it up'
        ];
    }
}
