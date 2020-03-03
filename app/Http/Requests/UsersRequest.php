<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email,',
            'password'=>'required|max:255',
            'roles'=>'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>':attribute was too short minimum 8 characters',
            'name.required'=>':attribute was required please fill it up!',
            'email.required'=>':attribute was required please fill it up',
            'roles'=>':attribute was required please fill it up'
        ];
    }
}
