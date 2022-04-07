<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMoviePostRequest extends FormRequest
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
            'movie_name' => 'required',
            'description' => 'required|max:1000',
            'category_id' => 'required',
            'time' => 'required|numeric|min:1|max:255',
            'link' => 'required',
        ];
    }
}
