<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|max:255|email',
            'password' => 'required',
        ];
    }
    public function messages()
    { 
        return [
            'required' => ':attribute không được để trống',
            'email' => 'Email không đúng định dạng',
            'confirmed' => 'Mật khẩu không đúng',
        ];
    }

    public function attributes(){
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ];
    }
}
