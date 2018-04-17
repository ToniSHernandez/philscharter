<?php

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'rate' => $faker->numberBetween(100, 400),
        'short_description' => $faker->sentence,
        'long_description' => $faker->paragraph
    ];
});
