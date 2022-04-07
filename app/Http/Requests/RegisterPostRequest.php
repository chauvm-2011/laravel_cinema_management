<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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
                'name' => 'required',
                'address' => 'required|max:255',
                'phone' => 'required|min:10|unique:users|numeric',
                'email' => 'required|email:filter|unique:users',
                'password' => 'required|min:8|max:30|confirmed',
        ];
    }
}
