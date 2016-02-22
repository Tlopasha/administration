<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stevebauman\Authorization\Traits\PermissionRolesTrait;

class Permission extends Model
{
    use PermissionRolesTrait;

    /**
     * The permissions table.
     *
     * @var string
     */
    protected $table = 'permissions';
}
