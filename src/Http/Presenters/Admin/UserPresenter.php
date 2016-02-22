<?php

namespace App\Http\Presenters\Admin;

use Orchestra\Contracts\Html\Form\Fieldset;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
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
                $method = 'POST';
                $url = route('admin.users.store');
            } else {
                $method = 'PATCH';
                $url = route('admin.users.update', [$user->getKey()]);
            }

            $form->attributes(compact('method', 'url'));

            $form->fieldset(function (Fieldset $fieldset) {
                $fieldset->control('input:text', 'name');

                $fieldset->control('input:text', 'email');

                $fieldset->control('input:password', 'password');

                $fieldset->control('input:password_confirmation', 'password');
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

            $table->column('name');
            $table->column('email');
        });
    }
}
