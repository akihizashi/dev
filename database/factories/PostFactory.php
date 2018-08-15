<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id'    => 1,
        'title'      => $faker->realText($maxNbChars = 125, $indexSize = 2),
        'body'       => $faker->realText($maxNbChars = 2000, $indexSize = 2),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        'image'      => 'noImage.jpg'
    ];
});
