<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run()
    {
        User::find(1)->givePermissionTo(config('access.permissions.view_backend'));
    }
}
