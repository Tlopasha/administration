<?php

namespace App\Http\Presenters\Admin;

use Orchestra\Contracts\Html\Form\Grid as FormGrid;
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
        return $this->form->of('roles', function (FormGrid $form) {
            //
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
        return $this->table->of('roles', function (TableGrid $table) {
            //
        });
    }
}
