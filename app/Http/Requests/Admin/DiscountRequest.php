<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'name' => 'required|min:3|max:70',
            'price' => 'required|numeric|min:1|max:100',
            'start_day' => 'required|date|after_or_equal:today',
            'finish_day' => 'required|date|after_or_equal:start_day',
            'quantity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'finish_day.after_or_equal' => 'thời gian kết thúc không được trước thời gian bắt đầu',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
            'numeric' => ':attribute phải là số',
            'start_day.after_or_equal' => 'ngày bắt đầu không được trước ngày hiện tại',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên mã giảm giá',
            'price' => 'Số % giảm giá',
            'start_day' => 'Thời gian bắt đầu',
            'finish_day' => 'Thời gian kết thúc',
            'quantity' => 'Số lượng mã giảm giá',
        ];
    }
}
