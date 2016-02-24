<?php

namespace App\Jobs\Admin\Role;

use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use App\Jobs\Job;

class Update extends Job
{
    /**
     * @var RoleRequest
     */
    protected $request;

    /**
     * @var Role
     */
    protected $role;

    /**
     * Constructor.
     *
     * @param RoleRequest $request
     * @param Role        $role
     */
    public function __construct(RoleRequest $request, Role $role)
    {
        $this->request = $request;
        $this->role = $role;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $this->role->name = $this->request->input('name', $this->role->name);
        $this->role->label = $this->request->input('label', $this->role->label);

        return $this->role->save();
    }
}
