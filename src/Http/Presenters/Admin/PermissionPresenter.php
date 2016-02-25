<?php

namespace App\Http\Presenters\Admin;

use App\Http\Presenters\Presenter;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Column;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;

class PermissionPresenter extends Presenter
{
    /**
     * Returns a new form for the specified permission.
     *
     * @param Permission $permission
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function form(Permission $permission)
    {
        return $this->form->of('permissions', function (FormGrid $form) use ($permission) {

        });
    }

    /**
     * Returns a new table of all permissions.
     *
     * @param Permission $permission
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function table(Permission $permission)
    {
        return $this->table->of('permissions', function (TableGrid $table) use ($permission) {
            $table->with($permission)->paginate($this->perPage);

            $table->column('label');

            $table->column('name');
        });
    }

    /**
     * Returns a new table of all users that have the specified permission.
     *
     * @param Permission $permission
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function tableUsers(Permission $permission)
    {
        $users = $permission->users();

        return $this->table->of('permissions.users', function (TableGrid $table) use ($permission, $users) {
            $table->with($users)->paginate(10);

            $table->pageName = 'users';

            $table->column('name', function (Column $column) {
                $column->value = function (User $user) {
                    return link_to_route('admin.users.show', $user->name, [$user->getKey()]);
                };
            });

            $table->column('email', function (Column $column) {
                // We'll remove this column when
                // viewing on smaller screens.
                $column->headers = [
                    'class' => 'hidden-xs',
                ];

                $column->attributes(function () {
                    return [
                        'class' => 'hidden-xs',
                    ];
                });
            });

            $table->column('remove', function (Column $column) use ($permission) {
                $column->value = function (User $user) use ($permission) {
                    return link_to_route('admin.permissions.users.destroy', 'Remove', [$permission->getKey(), $user->getKey()], [
                        'class'        => 'btn btn-xs btn-danger',
                        'data-post'    => 'DELETE',
                        'data-title'   => 'Are you sure?',
                        'data-message' => 'Are you sure you want to remove this permission from this user?',
                    ]);
                };
            });
        });
    }

    /**
     * Returns a new table of all roles that have the specified permission.
     *
     * @param Permission $permission
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function tableRoles(Permission $permission)
    {
        $roles = $permission->roles()->with('users');

        return $this->table->of('permissions.roles', function (TableGrid $table) use ($permission, $roles) {
            $table->with($roles)->paginate(10);

            $table->column('label', function (Column $column) {
                $column->value = function (Role $role) {
                    return link_to_route('admin.roles.show', $role->label, [$role->getKey()]);
                };
            });

            $table->column('name', function (Column $column) {
                // We'll remove this column when
                // viewing on smaller screens.
                $column->headers = [
                    'class' => 'hidden-xs',
                ];

                $column->attributes(function () {
                    return [
                        'class' => 'hidden-xs',
                    ];
                });
            });

            $table->column('users', function (Column $column) {
                $column->value = function (Role $role) {
                    return $role->users->count();
                };
            });

            $table->column('remove', function (Column $column) use ($permission) {
                $column->value = function (User $user) use ($permission) {
                    return link_to_route('admin.permissions.roles.destroy', 'Remove', [$permission->getKey(), $user->getKey()], [
                        'class'        => 'btn btn-xs btn-danger',
                        'data-post'    => 'DELETE',
                        'data-title'   => 'Are you sure?',
                        'data-message' => 'Are you sure you want to remove this permission from this role?',
                    ]);
                };
            });
        });
    }
}
