<?php

namespace App\Http\Presenters\Admin;

use App\Models\Role;
use Orchestra\Contracts\Html\Form\Fieldset;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Column;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use App\Models\User;
use App\Http\Presenters\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Returns a new form for the specified user.
     *
     * @param User $user
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function form(User $user)
    {
        return $this->form->of('users', function (FormGrid $form) use ($user) {
            if ($user->exists) {
                $method = 'PATCH';
                $url = route('admin.users.update', [$user->getKey()]);

                $form->submit = 'Save';
            } else {
                $method = 'POST';
                $url = route('admin.users.store');

                $form->submit = 'Create';
            }

            $form->attributes(compact('method', 'url'));

            $form->with($user);

            $form->fieldset(function (Fieldset $fieldset) use ($user) {
                $fieldset
                    ->control('input:text', 'name')
                    ->attributes([
                        'placeholder' => 'Enter the users name.',
                    ]);

                $fieldset
                    ->control('input:text', 'email')
                    ->attributes([
                        'placeholder' => 'Enter the users email address.',
                    ]);

                if ($user->exists) {
                    $fieldset
                        ->control('input:select', 'roles[]')
                        ->label('Roles')
                        ->options(function () {
                            return Role::all()->pluck('label', 'id');
                        })
                        ->value(function (User $user) {
                            return $user->roles->pluck('id');
                        })
                        ->attributes([
                            'class' => 'select-roles',
                            'multiple' => true,
                        ]);
                }

                $fieldset
                    ->control('input:password', 'password')
                    ->attributes([
                        'placeholder' => 'Enter a password to change the users password.',
                    ]);

                $fieldset
                    ->control('input:password', 'password_confirmation')
                    ->attributes([
                        'placeholder' => 'Enter the users password again.',
                    ]);
            });
        });
    }

    /**
     * Returns a new table for all users.
     *
     * @param User $user
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function table(User $user)
    {
        return $this->table->of('users', function (TableGrid $table) use ($user) {
            $table->with($user)->paginate($this->perPage);

            $table->column('name', function (Column $column) {
                $column->value = function (User $user) {
                    return link_to_route('admin.users.show', $user->name, [$user->getKey()]);
                };
            });

            $table->column('email');

            $table->column('roles', function (Column $column) {
                $column->value = function (User $user) {
                    $labels = '';

                    foreach($user->roles as $role) {
                        $labels .= $role->display_label.'<br>';
                    };

                    return $labels;
                };
            });
        });
    }
}
