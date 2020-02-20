<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Post::class, 50)->make()->each(function ($post) {
            $post->creator()
                ->associate(App\Models\User::find(rand(2, 10)))
                ->save();
        });
    }
}
