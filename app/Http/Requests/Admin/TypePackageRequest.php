<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TypePackageRequest extends FormRequest
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
            'TypePackage_name' => 'required|min:3|max:50',
            'subject_id' => 'required',
            'price' => 'required|numeric|min:1',
            'security' => 'required',
            'catetoryPackage' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'numeric' => 'phải là số'
        ];
    }

    public function attributes(){
        return [
            'TypePackage_name' => 'Tên loại gói tập',
            'subject_id' => 'Bộ môn',
            'price' => 'Giá',
            'security' => 'Quyền bảo lưu',
            'catetoryPackage' => 'Thể loại'
        ];
    }
}