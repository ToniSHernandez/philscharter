<?php

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = str_slug($title, '-');
    return [
        'title' => $title,
        'slug' => $slug,
        'subtitle' => $faker->sentence,
        'rate' => $faker->numberBetween(100, 400),
        'rate_info' => $faker->sentence,
        'description' => $faker->paragraph
    ];
});
