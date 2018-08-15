<?php

use Faker\Generator as Faker;

$factory->define(App\Shop::class, function (Faker $faker) {
    return [
      'name' => 'Product '. rand(0, 1000),
      'code' => $faker->ean8,
      'image' => $faker->randomElement(['disc1.jpg', 'disc2.jpg', 'disc3.jpg', 'disc4.jpg', 'disc5.jpg', 'disc6.jpg', 'disc7.jpg', 'disc8.jpg', 'disc9.jpg', 'disc10.jpg', 'disc11.jpg']),
      'category' => $faker->randomElement(['CD', 'DVD', 'Album']),
      'reposition' => rand(1, 99),
      'price' => rand(1000, 5000),
      'release' => $faker->date('Y-m-d'),
      'description' => 'This is product description',
      'created_at' => new Datetime,
      'updated_at' => new Datetime,
    ];
});
