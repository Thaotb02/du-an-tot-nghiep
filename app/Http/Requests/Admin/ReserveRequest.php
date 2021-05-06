<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'start_day' => 'required|after_or_equal:today',
            'finish_day' => 'required|after:start_day',
        ];
    }
    public function messages()
    {
        
        return [
            'required' => ':attribute không được để trống',
            'finish_day.after' => 'thời gian kết thúc không được trước thời gian bắt đầu',
            'start_day.after_or_equal' => ':attribute không được sau ngày hiện tại'
        ];
    }
    public function attributes(){
        return [
            'start_day' => 'Ngày bắt đầu',
            'finish_day' => 'Ngày kết thúc'
        ];
    }
}
