<?php

use App\Service;
use Carbon\Carbon;
use App\ServiceRequest;
use Faker\Generator as Faker;

$factory->define(ServiceRequest::class, function (Faker $faker) {
    // This will cause tests to fail in the year 2100. If people are still using this website then, we should try to convince them to upgrade.
    $requestedDate = Carbon::create(2099, 12, 31)->format('Y-m-d');
    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'phone'          => $faker->phoneNumber,
        'service_id'     => factory(Service::class)->create()->id,
        'requested_date' => $requestedDate,
        'guests'         => $faker->numberBetween(1, 9),
        'comments'       => $faker->paragraph
    ];
});
