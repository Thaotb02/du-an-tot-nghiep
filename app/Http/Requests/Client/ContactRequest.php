<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|integer',
            'name' => 'required'
            
        ];
    }
    public function messages()
    {
        
        return [
           
            'required' => ':attribute không được để trống',
            'email.email'=>'Nhập đúng định dạng email',
            'phone.integer'=>'Số điện thoại phải là số'
           
            
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên',
            'phone' => 'số điện thoại'  
        ];
    }
}
