<?php

namespace App\Processors\Admin;

use App\Http\Presenters\Admin\PermissionPresenter;
use App\Models\Permission;
use App\Processors\Processor;

class PermissionProcessor extends Processor
{
    /**
     * @var Permission
     */
    protected $permission;

    /**
     * @var PermissionPresenter
     */
    protected $presenter;

    /**
     * Constructor.
     *
     * @param Permission          $permission
     * @param PermissionPresenter $presenter
     */
    public function __construct(Permission $permission, PermissionPresenter $presenter)
    {
        $this->permission = $permission;
        $this->presenter = $presenter;
    }

    /**
     * Displays all permissions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $permissions = $this->presenter->table($this->permission);

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Displays the form for creating a new permission.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form = $this->presenter->form($this->permission);

        return view('admin.permissions.create', compact('form'));
    }

    public function store()
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
