<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditOrderRequest extends FormRequest
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
            'finish_date' => 'required',
        ];
    }
    public function messages()
    {
        
        return [
            'finish_date.required' => 'Thêm ngày bảo lưu không được để trống',
        ];
    }
      
}
