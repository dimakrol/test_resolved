<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text(),
        'active' => $faker->boolean
    ];
});
