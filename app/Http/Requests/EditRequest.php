<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string','max:255'],
            'phone' => ['required', 'string', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
            'email' => [ 'email', 'max:255', 'unique:users'],
        ];
    }
}
