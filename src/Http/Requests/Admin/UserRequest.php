<?php

namespace App\Http\Requests;

class UserRequest extends Request
{
    /**
     * The user request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    /**
     * Allows all users to create users.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
