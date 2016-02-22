<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stevebauman\Authorization\Traits\RolePermissionsTrait;

class Role extends Model
{
    use RolePermissionsTrait;

    /**
     * The roles table.
     *
     * @var string
     */
    protected $table = 'roles';
}
