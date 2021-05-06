<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:20|max:150',
            'subject_id' => 'required|',
            'content' => 'required',
            'author' => 'required',
            'featured_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            
        ];
    }
    public function messages()
    {
        
        return [
           
            'required' => ':attribute không được để trống',
            'mimes' => ':attribute không đúng định dạng ' ,
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
           
            
        ];
    }

    public function attributes(){
        return [
            'title' => 'Tiêu đề',
            'subject_id' => 'Bộ môn',
            'content' => 'Nội dung',
            'featured_image' => 'Ảnh',
            'author' => 'Tác Giả',
        ];
    }
}
