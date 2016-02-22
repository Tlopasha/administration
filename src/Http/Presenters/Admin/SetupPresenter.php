<?php

namespace App\Http\Presenters\Admin;

use Orchestra\Contracts\Html\Form\Fieldset;
use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use App\Http\Presenters\Presenter;

class SetupPresenter extends Presenter
{
    /**
     * Returns a new form for setting up administration.
     *
     * @return \Orchestra\Contracts\Html\Builder
     */
    public function form()
    {
        return $this->form->of('admin.setup', function (FormGrid $form) {
            $form->attributes([
                'method' => 'POST',
                'url' => route('admin.setup.finish'),
            ]);

            $form->fieldset(function (Fieldset $fieldset) {
                $fieldset
                    ->control('input:text', 'name')
                    ->attributes([
                        'placeholder' => 'Enter Administrator Name.',
                    ]);

                $fieldset
                    ->control('input:text', 'email')
                    ->attributes([
                        'placeholder' => 'Enter Administrator Email.',
                    ]);

                $fieldset
                    ->control('input:password', 'password')
                    ->attributes([
                        'placeholder' => 'Enter Administrator Password.',
                    ]);

                $fieldset
                    ->control('input:password', 'password_confirmation')
                    ->attributes([
                        'placeholder' => 'Enter Administrator Password Again.',
                    ]);
            });
        });
    }
}
