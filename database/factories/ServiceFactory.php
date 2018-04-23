<?php

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'rate' => $faker->numberBetween(100, 400),
        'rate_info' => $faker->sentence,
        'description' => $faker->paragraph
    ];
});
