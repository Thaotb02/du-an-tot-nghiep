<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InforRequest extends FormRequest
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
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required|numeric',
            'address' => 'required|min:3|max:50',
            'email' => 'required|unique:infors,email,',
            'phone' => 'required|regex:/0[0-9]{8}/|unique:infors,phone,',
           
        ];
    }

    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'mimes' => ':attribute không đúng định dạng - ảnh phải có đuôi jpg png gif',
            'email.unique'=> 'Email đã tồn tại',
            'phone.unique'=> 'Số  điện thoại đã tồn tại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'birth_date.before' => 'Ngày sinh không được trước ngày hiện tại',
           
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên khách hàng',
            'avatar' => 'Avatar',
            'gender' => 'Giới tính',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
        ];
    }
}
