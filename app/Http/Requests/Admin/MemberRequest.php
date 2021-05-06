<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required',
            'phone' => 'required|regex:/0[0-9]{8}/|unique:infors,phone,',
            'email' => 'required|email|unique:infors,email,',
            'address' => 'required',
            'avatar' => 'mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'mimes' => ':attribute không đúng định dạng - ảnh phải có đuôi jpg png gif',
            'name.regex' => 'Họ và Tên phải viết hoa',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'birth_date.before' => 'Ngày sinh không được trước ngày hiện tại',
            'email' => 'không đúng định dạng',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Họ và Tên',
            'birth_date' => 'Ngày Sinh',
            'gender' => 'Giới Tính',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'avatar' => 'Ảnh',
        ];
    }
}
