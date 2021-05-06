<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChangeResetPassword extends FormRequest
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
            'password' => 'required',
            'password_comfirm' => 'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'password_comfirm.same' => 'Mật khẩu mới không trùng nhau'
        ];
    }
    public function attributes(){
        return [
            'password' => 'Mật khẩu mới',
            'price' => 'Nhập lại mật khẩu mới',
        ];
    }
}
