<?php

namespace App\Http\Presenters\Admin;

use Orchestra\Contracts\Html\Form\Fieldset;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use App\Http\Presenters\Presenter;

class AuthPresenter extends Presenter
{
    /**
     * Returns a new login form.
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function form()
    {
        return $this->form->of('auth', function (FormGrid $form) {
            $form->attributes([
                'method' => 'POST',
                'url' => route('admin.auth.login'),
            ]);

            $form->layout('admin.components.form-login');

            $form->submit = 'Login';

            $form->fieldset(function (Fieldset $fieldset) {
                $fieldset->control('input:text', 'email');

                $fieldset->control('input:password', 'password');
            });
        });
    }
}
