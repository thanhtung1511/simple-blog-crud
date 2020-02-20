<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run()
    {
        // Create Roles
        Role::create(['name' => config('access.roles.admin')]);
        Role::create(['name' => config('access.roles.default')]);

        // Create Permissions
        Permission::create(['name' => config('access.permissions.view_backend')]);
    }
}
