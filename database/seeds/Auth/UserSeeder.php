<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run()
    {
        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@simple-blog.com',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'first_name' => 'Default',
            'last_name' => 'User',
            'email' => 'user@simple-blog.com',
            'password' => Hash::make('secret')
        ]);

        factory(App\Models\User::class, 9)->create();
    }
}
