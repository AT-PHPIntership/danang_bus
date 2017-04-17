<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
            case 'PATCH':
                return [
                  'title'   => 'required',
                  'content' => 'required',
                  'picture_path'=>'image',
                  'category_id'=>'required',
                ];
            case 'POST':
                return [
                  'title'   => 'required',
                  'content' => 'required',
                  'picture_path'=>'required|image',
                  'category_id'=>'required',
                ];
            default:
                return [];
        }
    }
}
