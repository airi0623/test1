<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\recipe;
use Faker\Generator as Faker;

$factory->define(recipe::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
        'title' => $faker->realText($faker->numberBetween(10,25)),
        'image' => $faker->realText($faker->numberBetween(10,25)),
        'category_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
