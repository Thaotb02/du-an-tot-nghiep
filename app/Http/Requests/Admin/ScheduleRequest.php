<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'pt_id' => 'required',
            'time_id' => 'required',
            'date' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'date.after_or_equal' => 'Thời gian bắt đầu không được sau ngày hiện tại'
        ];
    }

    public function attributes(){
        return [
            'pt_id' => 'tên Huấn luyện viên',
            'time_id' => 'Ca làm',
            'date' => 'thời gian tạo'
        ];
    }
}
