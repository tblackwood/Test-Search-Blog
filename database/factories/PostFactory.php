<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(rand(5, 10), true );
    $desc = $faker->realText(rand(1000, 2000));
    $data = [
        'category_id' => rand(1,6),
        'title' => $title,
        'excerpt' => $faker->text(rand(40, 100)),
        'description' => $desc,
    ];

    return $data;
});
