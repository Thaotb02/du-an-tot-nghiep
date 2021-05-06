<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
 
class updateSubject extends FormRequest
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
            'subject_name' => 'required|min:3|max:50',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'mimes' => ':attribute không đúng định dạng ' ,
        ];
    }

    public function attributes(){
        return [
            'subject_name' => 'Tên Bộ Môn',
            'description' => 'Mô tả',
            'image' => 'Ảnh'
        ];
    }
}
