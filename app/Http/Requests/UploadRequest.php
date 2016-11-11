<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadRequest extends Request
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
            'title' => 'required',
            'description' => "required",
            'book' => 'mimes:jpeg,bmp,png,pdf,doc'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Tiêu đề không để trống',
            'description.required' => "Mô tả không để trống",
            'book.mimes' => 'Định dạng không được chấp nhận',
        ];   
    }
}
