<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id'   => 'required',
            // 'slug' => 'required|unique:posts',
            'content' => 'required'
            
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
            'title.required' => 'Không được để rỗng title!',
            'title.max' => 'Title ngắn hơn 255 ký tự! ',
            'description.required' => 'Không được để trống!',
            'category_id' => 'Cần một thư mục!',
            // 'slug.required' => 'Cần đường dẫn',
            // 'slug.unique' => 'Đường dẫn đã có :((',
            'content.required' => 'Yêu cầu nhập nội dung!'
        ];
    }
}
