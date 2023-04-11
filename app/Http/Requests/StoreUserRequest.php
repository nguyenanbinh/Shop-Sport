<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>['required','min:3','max:50'],
            'address'=>['required','min:3','max:50'],
            'phone'=>['required','min:10','max:11'],
            'email'=>['required','min:5','max:50'],
        ];
    }

    // custom rules
    public function messages(){
        return[
            'name.required'=>'User\'s name is required !!!'
        ];
    }
}
