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

        // User Permissions
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

        // Role Permissions
        Permission::firstOrCreate([
            'name' => 'admin.roles.index',
            'label' => 'View All Roles',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.roles.create',
            'label' => 'Create Roles',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.roles.edit',
            'label' => 'Edit Roles',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.roles.show',
            'label' => 'View Roles',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.roles.destroy',
            'label' => 'Delete Roles',
        ]);

        // Permission Permissions
        Permission::firstOrCreate([
            'name' => 'admin.permissions.index',
            'label' => 'View All Permissions',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.permissions.create',
            'label' => 'Create Permissions',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.permissions.edit',
            'label' => 'Edit Permissions',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.permissions.show',
            'label' => 'View Permissions',
        ]);

        Permission::firstOrCreate([
            'name' => 'admin.permissions.destroy',
            'label' => 'Delete Permissions',
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

        // Delete User Permissions
        Permission::whereName('admin.users.index')->delete();
        Permission::whereName('admin.users.create')->delete();
        Permission::whereName('admin.users.edit')->delete();
        Permission::whereName('admin.users.show')->delete();
        Permission::whereName('admin.users.destroy')->delete();

        // Delete Role Permissions
        Permission::whereName('admin.roles.index')->delete();
        Permission::whereName('admin.roles.create')->delete();
        Permission::whereName('admin.roles.edit')->delete();
        Permission::whereName('admin.roles.show')->delete();
        Permission::whereName('admin.roles.destroy')->delete();

        // Delete Permission Permissions
        Permission::whereName('admin.permissions.index')->delete();
        Permission::whereName('admin.permissions.create')->delete();
        Permission::whereName('admin.permissions.edit')->delete();
        Permission::whereName('admin.permissions.show')->delete();
        Permission::whereName('admin.permissions.destroy')->delete();
    }
}
