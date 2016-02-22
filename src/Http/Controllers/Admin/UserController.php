<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Processors\Admin\UserProcessor;

class UserController extends Controller
{
    /**
     * @var UserProcessor
     */
    protected $processor;

    /**
     * Constructor.
     *
     * @param UserProcessor $processor
     */
    public function __construct(UserProcessor $processor)
    {
        $this->processor = $processor;
    }

    /**
     * Displays all users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return $this->processor->index();
    }

    public function create()
    {
        return $this->processor->create();
    }

    public function store(UserRequest $request)
    {
        if ($this->processor->store($request)) {
            flash();
        } else {

        }
    }

    public function show()
    {
        //
    }
}
