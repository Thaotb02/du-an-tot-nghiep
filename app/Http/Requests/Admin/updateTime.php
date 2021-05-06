<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class updateTime extends FormRequest
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
            'time_name' => 'required|min:3|max:25|unique:times,time_name,'.$this->id,
            'time_start' => 'required',
            'time_finish' => 'required'
        ];
    }

    public function messages()
    {
        
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
        ];
    }

    public function attributes(){
        return [
            'time_name' => 'tên ca làm',
            'time_start' => 'thời gian bắt đầu',
            'time_finish' => 'thời gian kết thúc'
        ];
    }
}
