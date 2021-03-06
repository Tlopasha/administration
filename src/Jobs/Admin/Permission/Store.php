<?php

namespace App\Jobs\Admin\Permission;

use App\Http\Requests\Admin\PermissionRequest;
use App\Jobs\Job;
use App\Models\Permission;

class Store extends Job
{
    /**
     * @var PermissionRequest
     */
    protected $request;

    /**
     * @var Permission
     */
    protected $permission;

    /**
     * Constructor.
     *
     * @param PermissionRequest $request
     * @param Permission        $permission
     */
    public function __construct(PermissionRequest $request, Permission $permission)
    {
        $this->request = $request;
        $this->permission = $permission;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $this->permission->name = $this->request->input('name');
        $this->permission->label = $this->request->input('label');

        return $this->permission->save();
    }
}
