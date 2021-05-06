<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Password extends FormRequest
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
            'password' => 'required|min:5|max:12|',
            'password_confirmation' => 'same:password',
        ];
    }

    public function messages()
    {
        
        return [

            'required' => ':attribute không được để trống',
           
        ];
    }

    public function attributes(){
        return [
            'password' => 'Mật khẩu',
           
        ];
    }
}

