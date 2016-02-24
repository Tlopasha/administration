<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class RoleRequest extends Request
{
    /**
     * The role request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        $roles = $this->route('roles');

        return [
            'name' => "required|unique:roles,name,$roles",
            'label' => 'required'
        ];
    }

    /**
     * Allows all users to create / edit roles.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
