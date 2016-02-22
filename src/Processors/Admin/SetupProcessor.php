<?php

namespace App\Processors\Admin;

use App\Http\Jobs\Admin\Setup\Finish\Finish;
use App\Http\Presenters\Admin\SetupPresenter;
use App\Http\Requests\Admin\SetupRequest;
use App\Models\Role;
use App\Models\User;
use App\Processors\Processor;

class SetupProcessor extends Processor
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var SetupPresenter
     */
    protected $presenter;

    /**
     * Constructor.
     *
     * @param Role           $role
     * @param User           $user
     * @param SetupPresenter $presenter
     */
    public function __construct(Role $role, User $user, SetupPresenter $presenter)
    {
        $this->role = $role;
        $this->user = $user;
        $this->presenter = $presenter;
    }

    /**
     * Displays the form for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function begin()
    {
        $form = $this->presenter->form();

        return view('admin.setup.begin', compact('form'));
    }

    /**
     * Finishes the administration setup.
     *
     * @param SetupRequest $request
     *
     * @return bool
     */
    public function finish(SetupRequest $request)
    {
        $user = $this->user->newInstance();

        return $this->dispatch(new Finish($request, $user));
    }
}
