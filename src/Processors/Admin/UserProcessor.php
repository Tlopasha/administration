<?php

namespace App\Processors\Admin;

use App\Http\Presenters\Admin\UserPresenter;
use App\Models\User;
use App\Processors\Processor;

class UserProcessor extends Processor
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var UserPresenter
     */
    protected $presenter;

    /**
     *  Constructor.
     *
     * @param User         $user
     * @param UserPresenter $presenter
     */
    public function __construct(User $user, UserPresenter $presenter)
    {
        $this->user = $user;
        $this->presenter = $presenter;
    }

    /**
     * Displays all users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('users.index');

        $users = $this->presenter->table($this->user);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Displays the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('users.create');

        $form = $this->presenter->form($this->user);

        return view('admin.users.create', compact('form'));
    }

    public function store()
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
