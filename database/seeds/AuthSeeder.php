<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class AuthTableSeeder.
 */
class AuthSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Reset cached roles and permissions
        resolve(PermissionRegistrar::class)->forgetCachedPermissions();

        // Disable foreign key check before truncate tables
        $this->disableForeignKeys();
        $this->truncateMultiple([
            config('permission.table_names.model_has_permissions'),
            config('permission.table_names.model_has_roles'),
            config('permission.table_names.role_has_permissions'),
            config('permission.table_names.permissions'),
            config('permission.table_names.roles'),
            'users',
            'password_resets',
        ]);

        $this->call(UserSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserPermissionSeeder::class);

        $this->enableForeignKeys();
    }
}
