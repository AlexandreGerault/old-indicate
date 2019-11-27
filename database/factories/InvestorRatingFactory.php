<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\InvestorRating;
use Faker\Generator as Faker;

$factory->define(InvestorRating::class, function (Faker $faker) {
    return [
        'support_quality' => $faker->numberBetween(0, 5),
        'procedure_simplicity' => $faker->numberBetween(0, 5),
        'procedure_speed' => $faker->numberBetween(0, 5),
        'global_rating' => $faker->numberBetween(0, 5)
    ];
});
