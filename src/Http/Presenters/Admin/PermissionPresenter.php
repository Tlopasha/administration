<?php

namespace App\Http\Presenters\Admin;

use Orchestra\Contracts\Html\Form\Grid as FormGrid;
use Orchestra\Contracts\Html\Table\Grid as TableGrid;
use App\Http\Presenters\Presenter;
use App\Models\Permission;

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
}
