<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToyRobotRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'xaxis'          => 'required|integer|between:0,4',
            'yaxis'          => 'required|integer|between:0,4',
            'direction'      => 'required|string',
            'robot_action.*' => 'required|string',
        ];
    }
}
