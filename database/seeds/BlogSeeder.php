<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key check before truncate tables
        $this->disableForeignKeys();
        $this->truncateMultiple([
            'posts',
        ]);

        $this->call(PostSeeder::class);

        $this->enableForeignKeys();
    }
}
