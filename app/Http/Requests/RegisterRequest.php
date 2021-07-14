<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:5',
            'email' => 'required|email:filter|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'birth_date'=>'required|date',
            'profile_image' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'



        ];
    }
}
