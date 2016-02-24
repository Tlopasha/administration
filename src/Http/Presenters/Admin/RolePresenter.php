<?php

namespace App\Http\Presenters\Admin;

use App\Models\Permission;
use App\Models\User;
use Orchestra\Contracts\Html\Form\Fieldset;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Column;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use App\Http\Presenters\Presenter;
use App\Models\Role;

class RolePresenter extends Presenter
{
    /**
     * Returns a new form for the specified role.
     *
     * @param Role $role
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function form(Role $role)
    {
        return $this->form->of('roles', function (FormGrid $form) use ($role) {
            if ($role->exists) {
                $method = 'PATCH';
                $url = route('admin.roles.update', [$role->getKey()]);

                $form->submit = 'Save';
            } else {
                $method = 'POST';
                $url = route('admin.roles.store', [$role->getKey()]);

                $form->submit = 'Create';
            }

            $form->attributes(compact('method', 'url'));

            $form->with($role);

            $form->fieldset(function (Fieldset $fieldset) {
                $fieldset
                    ->control('input:text', 'name')
                    ->attributes([
                        'placeholder' => 'Enter the roles name.',
                    ]);

                $fieldset
                    ->control('input:text', 'label')
                    ->attributes([
                        'placeholder' => 'Enter the roles display label.',
                    ]);
            });
        });
    }

    /**
     * Returns a new table displaying all roles.
     *
     * @param Role $role
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function table(Role $role)
    {
        return $this->table->of('roles', function (TableGrid $table) use ($role) {
            $table->with($role)->paginate($this->perPage);

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
        });
    }

    /**
     * Returns a new table for the specified role users.
     *
     * @param Role $role
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function tableUsers(Role $role)
    {
        $users = $role->users()->orderBy('name');

        return $this->table->of('roles.users', function (TableGrid $table) use ($users) {
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

            $table->column('remove', function (Column $column) {
                $column->value = function (User $user) {
                    return link_to('', 'Remove', [
                        'class' => 'btn btn-xs btn-danger',
                        'data-post' => 'DELETE',
                        'data-title' => 'Are you sure?',
                        'data-message' => 'Are you sure you want to remove this user?',
                    ]);
                };
            });
        });
    }

    /**
     * Returns a new table for the specified role permissions.
     *
     * @param Role $role
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function tablePermissions(Role $role)
    {
        $permissions = $role->permissions()->orderBy('name');

        return $this->table->of('roles.permissions', function (TableGrid $table) use ($permissions) {
            $table->with($permissions)->paginate(10);

            $table->pageName = 'permissions';

            $table->column('label', function (Column $column) {
                $column->value = function (Permission $permission) {
                    return link_to_route('admin.permissions.show', $permission->label, [$permission->getKey()]);
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

            $table->column('remove', function (Column $column) {
                $column->value = function (Permission $permission) {
                    return link_to('', 'Remove', [
                        'class' => 'btn btn-xs btn-danger',
                        'data-post' => 'DELETE',
                        'data-title' => 'Are you sure?',
                        'data-message' => 'Are you sure you want to remove this permission?',
                    ]);
                };
            });
        });
    }
}
