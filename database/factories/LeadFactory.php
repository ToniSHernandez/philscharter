<?php

use App\Lead;
use Faker\Generator as Faker;
use App\Service;
use Carbon\Carbon;

$factory->define(Lead::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'message' => $faker->paragraph,
        'service_id' => factory(Service::class)->create()->id,
        'requested_date' => Carbon::now()->addMonth()->format('Y-m-d')
    ];
});
