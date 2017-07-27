<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->segment(3).',id',
            'password' => 'required|string|min:6|confirmed',
        ];
    }


    /**
     * Custom validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên tài khoản là thông tin cần thiết',
            'email.required' => 'Email là thông tin cần thiết',
            'password.required' => 'Password thông tin cần thiết',
        ];
    }
}
