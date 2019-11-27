<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    $counties = [
        'Auvergne-Rhône-Alpes',
        'Bourgogne-Franche-Comté',
        'Bretagne',
        'Centre-Val de Loire',
        'Corse',
        'Grand Est',
        'Hauts-de-France',
        'Île-de-France',
        'Normandie',
        'Nouvelle-Aquitaine',
        'Occitanie',
        'Pays de la Loire',
        'Provence-Alpes-Côte d\'Azur',

        'Guadeloupe',
        'Martinique',
        'Réunion',
        'Guyane',
        'Mayotte'
    ];

    return [
        'postcode' => $faker->randomNumber(5),
        'house_number' => $faker->numberBetween(1, 235),
        'county' => $faker->randomElement($counties),
        'country' => 'France',
        'road' => $faker->streetName,
        'city' => $faker->city
    ];
});
