<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\Rating;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'comment' => $faker->realText()
    ];
});
