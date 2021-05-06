<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'content' => 'required',
            'pt_id' => 'required',
            'member_id' => 'required',
        ];
    }

    public function messages()
    { 
        return [
            'required' => ':attribute không được để trống',
        ];
    }

    public function attributes(){
        return [
            'content' => 'Nội dung',
            'pt_id' => 'Huấn luyện viên',
            'member_id' => 'Hội Viên',
        ];
    }
}
