<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->call(AuthSeeder::class);
        $this->call(BlogSeeder::class);

        Model::reguard();
    }
}
