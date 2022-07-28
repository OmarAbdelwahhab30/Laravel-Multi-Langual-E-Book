<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UploadBookRequest extends FormRequest
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
            'bookname'  => ['required', 'string', 'max:255'],
            'author'    => ['required', 'string', 'max:255'],
            'info'      => ['required'],
            'img'       => ['required'],
            'file'      => ['required','mimes:pdf'],
            'category'  => ['required'],
        ];
    }
}
