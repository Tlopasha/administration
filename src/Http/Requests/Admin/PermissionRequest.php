<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class PermissionRequest extends Request
{
    /**
     * The permission request validation rules.
     *
     * @return array
     */
    public function rules()
    {
        $permissions = $this->route('permissions');

        return [
            'name'  => "required|unique:permissions,name,$permissions",
            'label' => 'required',
        ];
    }

    /**
     * Allows all users to create / edit permissions.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
