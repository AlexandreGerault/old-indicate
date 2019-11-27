<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\Structure;
use Faker\Generator as Faker;

$factory->define(Structure::class, function (Faker $faker) {
    $siren = $faker->randomNumber(9);
    $siret = (int) $siren . $faker->randomNumber(5);
    return [
        'name' => $faker->company,
        'comment' => $faker->realText(50),
        'siren' => $siren,
        'siret' => $siret,
        'verified' => $faker->boolean,
        'data_type' => $faker->randomElement(['company', 'consulting', 'investor']) . '_data'
    ];
});
