<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogUser extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'email|required',
            'phone' => 'required|max:11',
            
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên quá dài',
            'email' => 'Đặt đúng định dạng email',
            'email.required' => 'Không được để trống email',
            'phone.required' => 'Không được để trống SDT',
            'phone.max' => 'SDT không được quá 11 số',
        ];
    }
}
