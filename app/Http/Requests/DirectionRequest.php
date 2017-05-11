<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectionRequest extends FormRequest
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
            'order' => 'required | numeric',
            'route_id' => 'required',
            'stop_id' => 'required',
            'status' => 'required',
            'fee' => 'required | numeric',
            'time' => 'required | date_format:H:i:s'
        ];
    }
}
