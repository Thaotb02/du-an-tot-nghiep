<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class updateMember extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'email' => 'required',
            'phone' => 'required',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required',
            'address' => 'required',
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
            'numeric' => ':attribute phải là số',
            'birth_date.before' => 'ngày sinh không được trước ngày hiện tại',
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
