<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\CompanyRating;
use Faker\Generator as Faker;

$factory->define(CompanyRating::class, function (Faker $faker) {
    return [
        'skills' => $faker->numberBetween(0, 5),
        'expertise' => $faker->numberBetween(0, 5),
        'market' => $faker->numberBetween(0, 5),
        'advantage_designed' => $faker->numberBetween(0, 5),
        'team' => $faker->numberBetween(0, 5),
        'shareholding_created' => $faker->numberBetween(0, 5),
        'input_barrier' => $faker->numberBetween(0, 5),
        'value_creation' => $faker->numberBetween(0, 5),
    ];
});
