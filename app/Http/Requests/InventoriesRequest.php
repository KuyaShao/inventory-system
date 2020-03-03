<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoriesRequest extends FormRequest
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
            'requester'=>'required|max:255',
            'qty'=>'digits_between:1,9|required',
            'uom'=>'digits_between:1,9|required',
            'particulars'=>'required|max:255',
            'remarks'=>'required|max:255',
            'gso_no'=>'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'requester.required'=>':attribute has required please fill it up!',
            'qty.required'=>':attribute has required please fill it up!',
            'uom.required'=>':attribute has required please fill it up!',
            'particulars.required'=>':attribute has required please fill it up!',
            'remarks.required'=>':attribute has required please fill it up!',
            'req_id.required'=>'Pick at least one in dropdown list!',
            'gso_no'=>':attribute has required please fill it up!',
            ];
    }
}
