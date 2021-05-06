<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;


class TimeRequest extends FormRequest
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
            'time_name' => 'required|min:3|max:25',
            'time_start' => 'required|date_format:H:i',
            'time_finish' => 'required|date_format:H:i|after:time_start',
        ];
    }

    public function messages()
    {
        
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute không được để trống',
            'time_finish.after' => 'thời gian kết thúc không được trước thời gian bắt đầu',
            'min' => ':attribute không được nhỏ hơn :min ký tự',
            'max' => ':attribute không được lớn hơn :max ký tự',
        ];
    }

    public function attributes(){
        return [
            'time_name' => 'Tên ca làm',
            'time_start' => 'Thời gian bắt đầu',
            'time_finish' => 'thời gian kết thúc'
        ];
    }
}

