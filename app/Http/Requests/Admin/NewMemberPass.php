<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewMemberPass extends FormRequest
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
            'birth_date' => 'required|date|before_or_equal:today',
            'email' => 'required|unique:infors,email,',
            'phone' => 'required|regex:/0[0-9]{8}/||unique:infors,phone,',
            'gender' => 'required',
            'address' => 'required',
            'start_date' => 'required|after_or_equal:today'
        ];
    }
    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'unique'=> ':attribute đã tồn tại',
            'phone.regex'=> 'Số điện thoại không đúng định dạng',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'start_date.required' => 'Thời gian bắt đầu không được để trống',
            'after_or_equal' => ':attribute không được trước ngày hiện tại',
            'birth_date.before_or_equal' => 'Ngày sinh không được sau ngày hiện tại'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên khách hàng',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'birth_date' => 'Ngày sinh',
            'start_date' => 'Ngày bắt đầu',
            'gender' => 'Giới tính'
        ];
    }
}
