<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run()
    {
        User::find(1)->assignRole(config('access.roles.admin'))->givePermissionTo(config('access.permissions.view_backend'));

        foreach (User::whereIn('id', [2, 10])->get() as $user) {
            $user->assignRole(config('access.roles.default'));
        }
    }
}
