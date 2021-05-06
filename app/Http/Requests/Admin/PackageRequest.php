<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'package_name' => 'required|min:3|max:50',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'subject_id' => 'required',
            'description' => 'required',
            'categoryPackage' => 'required',
        ];
    }

    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
        ];
    }

    public function attributes(){
        return [
            'package_name' => 'Tên Gói Tập',
            'subject_id' => 'Bộ Môn',
            'image' => 'Ảnh',
            'address' => 'Địa chỉa',
            'description' => 'Mô tả',
            'categoryPackage' => 'Gói tập',
        ];
    }
}
