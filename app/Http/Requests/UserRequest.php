<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $username_unique = Rule::unique('users', 'username');
        if ($this->method() !== 'POST') {
            $username_unique->ignore($this->route()->parameter('id'));
        }

        return [
            'type' => 'required|in:admin,user',
            'username' => 'required|string', $username_unique,
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'isian :attribute tidak memenuhi',
            'password.min' => 'Password harus memiliki setidaknya 6 karakter',
        ];
    }
}
