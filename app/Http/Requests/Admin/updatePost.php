<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class updatePost extends FormRequest
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
            'title' => 'required|min:3|max:120',
            'subject_id' => 'required|',
            'content' => 'required', 
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
            'title' => 'Tiêu đề',
            'subject_id' => 'Bộ môn',
            'content' => 'Nội dung',
        ];
    }
}
