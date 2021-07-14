<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'string|min:5',
            'email' => 'email:filter|unique:users',
            'password' => 'string|min:8',
            'password_confirmation' => 'same:password',
            'birth_date'=>'date',
            'profile_image' => 'mimes:jpg,jpeg,png,bmp|max:20000'

        ];
    }

}
