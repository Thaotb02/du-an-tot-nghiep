<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Taikhoan extends FormRequest
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
            'user_name' => 'required|min:5|max:15|alpha_dash|unique:users,user_name,' . $this->id,
            'images' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'required|min:3|max:15',
            'hoten' => 'required|min:3|max:25',
            'diachi' => 'required|min:3|max:50',
            'email' => 'required|unique:users,email,' . $this->id,
            'sdt' => 'required|numeric|digits_between:10,11|unique:users,sdt,' . $this->id
        ];
    }

    public function messages()
    {
        
        return [
            'alpha_dash'=> 'Tài khoản nhập sai định dạng',
            'user_name.unique'=> 'Tài khoản đã tồn tại',
            'email.unique'=> 'Email đã tồn tại',
            'sdt.unique'=> 'Số  điện thoại đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'mimes' => ':attribute không đúng định dạng - ảnh phải có đuôi jpg png gif',
            'numeric' => ':attribute phải là số',
            'digits_between' => ':attribute phải từ 10 - 11 số'
        ];
    }

    public function attributes(){
        return [
            'user_name' => 'Tài khoản',
            'images' => 'Ảnh đại diện',
            'password' => 'Mật khẩu',
            'hoten' => 'Họ tên',
            'diachi' => 'Địa chỉ',
            'email' => 'Email',
            'sdt' => 'Số điện thoại'
        ];
    }
}
