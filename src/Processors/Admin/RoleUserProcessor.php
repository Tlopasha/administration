<?php

namespace App\Processors\Admin;

use App\Http\Requests\Admin\RoleUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Processors\Processor;

class RoleUserProcessor extends Processor
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * @var User
     */
    protected $user;

    /**
     * Constructor.
     *
     * @param Role $role
     * @param User $user
     */
    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Adds the requested users to the specified role.
     *
     * @param RoleUserRequest $request
     * @param int|string      $roleId
     *
     * @return array|false
     */
    public function store(RoleUserRequest $request, $roleId)
    {
        $role = $this->role->findOrFail($roleId);

        $users = $request->input('users', []);

        if (count($users) > 0) {
            $users = $this->user->findMany($users);

            return $role->users()->saveMany($users);
        }

        return false;
    }

    /**
     * Removes the specified user from the specified role.
     *
     * @param int|string $roleId
     * @param int|string $userId
     *
     * @return int
     */
    public function destroy($roleId, $userId)
    {
        $role = $this->role->findOrFail($roleId);

        $user = $role->users()->findOrFail($userId);

        return $role->users()->detach($user);
    }
}
