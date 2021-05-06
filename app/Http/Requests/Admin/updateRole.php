<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class updateRole extends FormRequest
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
            'role_name' => 'required|min:3|max:25|unique:roles,role_name,'.$this->id,
        ];
    }

    public function messages()
    {
        
        return [
            'role_name.unique'=> 'Tên quyền đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự'
        ];
    }

    public function attributes(){
        return [
            'role_name' => 'Tên quyền'
        ];
    }
}
