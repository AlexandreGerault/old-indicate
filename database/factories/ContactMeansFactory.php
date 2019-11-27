<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\ContactMeans;
use Faker\Generator as Faker;

$factory->define(ContactMeans::class, function (Faker $faker) {
    return [
        'email' => $faker->companyEmail,
        'phone_number' => $faker->phoneNumber
    ];
});
