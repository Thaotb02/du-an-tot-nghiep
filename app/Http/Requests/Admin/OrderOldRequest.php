<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderOldRequest extends FormRequest
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
            'member_id' => 'required',
            'time' => 'required',
            'start_date' => 'required|after_or_equal:today'
        ];
    }
    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'after_or_equal' => ':attribute không được trước ngày hiện tại',
        ];
    }
    public function attributes(){
        return [
            'member_id' => 'Hội viên',
            'time' => 'Thời gian',
            'start_date' => "Thời gian bắt đầu"
        ];
    }
}
