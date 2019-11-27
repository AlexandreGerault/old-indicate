<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\ConsultingRating;
use Faker\Generator as Faker;

$factory->define(ConsultingRating::class, function (Faker $faker) {
    return [
        'support_quality' => $faker->numberBetween(0, 5),
        'procedure_simplicity' => $faker->numberBetween(0, 5),
        'procedure_speed' => $faker->numberBetween(0, 5),
        'global_rating' => $faker->numberBetween(0, 5)
    ];
});
