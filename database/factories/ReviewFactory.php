<?php

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'author' => $faker->firstName,
        'body' => $faker->paragraph,
        'featured' => $faker->boolean(),
        'submitted_on' => $faker->dateTime(), 'source' => $faker->url,
        'rating' => $faker->numberBetween(1, 5)
    ];
});
