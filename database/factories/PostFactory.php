<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->text(100);
    $published = rand(0, 1);
    return [
        'title' => $title,
        'slug' => \Illuminate\Support\Str::slug($title),
        'image' => '',
        'content' => $faker->paragraph(),
        'published' => $published ? true : false,
        'published_at' => $published ? now() : null,
    ];
});
