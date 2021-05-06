<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/0[0-9]{8}/',
        ];
    }

    public function messages()
    { 
        return [
            'required' => ':attribute không được để trống',
            'phone.regex'=> 'Số điện thoại không đúng định dạng',
            'email.email' => 'không đúng định dạng email',
            'phone.digits_between' => 'Số điện thoại trong khoảng 10 - 11 số',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên người phản hồi',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'content' => 'Nội Dung'
        ];
    }
}
