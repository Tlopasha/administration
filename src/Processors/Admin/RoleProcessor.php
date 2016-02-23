<?php

namespace App\Processors\Admin;

use App\Http\Presenters\Admin\RolePresenter;
use App\Models\Role;
use App\Processors\Processor;

class RoleProcessor extends Processor
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * @var RolePresenter
     */
    protected $presenter;

    /**
     * Constructor.
     *
     * @param Role          $role
     * @param RolePresenter $presenter
     */
    public function __construct(Role $role, RolePresenter $presenter)
    {
        $this->role = $role;
        $this->presenter = $presenter;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
