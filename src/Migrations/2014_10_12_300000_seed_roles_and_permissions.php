<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;

class SeedRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $administrator = Role::firstOrCreate([
            'name' => 'administrator',
            'label' => 'Administrator',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.users.index',
            'label' => 'View All Users',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.users.create',
            'label' => 'Create Users',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.users.edit',
            'label' => 'Edit Users',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.users.show',
            'label' => 'View Users',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.users.destroy',
            'label' => 'Delete Users',
        ]);

        $administrator->grant(Permission::all());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::whereName('administrator')->delete();

        Permission::whereName('admin.users.index')->delete();
        Permission::whereName('admin.users.create')->delete();
        Permission::whereName('admin.users.edit')->delete();
        Permission::whereName('admin.users.show')->delete();
        Permission::whereName('admin.users.destroy')->delete();
    }
}
