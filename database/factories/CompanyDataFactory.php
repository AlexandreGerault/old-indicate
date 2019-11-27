<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\CompanyData;
use Faker\Generator as Faker;

$factory->define(CompanyData::class, function (Faker $faker) {
    return [
        'accept_offers' => $faker->boolean,
        'partnership' => $faker->boolean,
        'bank_funding' => $faker->boolean,
        'wcr' => $faker->boolean,
        'shareholding' => $faker->boolean,
        'looking_for_funding' => $faker->boolean,
        'looking_for_accompaniment' => $faker->boolean,

        'share_capital' => $faker->randomNumber(),
        'employees_number' => $faker->numberBetween(1, 1000),
        'clients_number' => $faker->numberBetween(1, 1000),
        'turnover' => $faker->randomNumber(),
        'turnover_projection' => $faker->randomNumber(),
        'average_monthly_turnover' => $faker->randomNumber(),
        'logistic_cost' => $faker->randomNumber(),
        'marketing_cost' => $faker->randomNumber(),
        'banking_investment' => $faker->randomNumber(),
        'ebitda' => $faker->randomNumber(),
        'investment_sought' => $faker->randomNumber(),
        'gross_margin' => $faker->randomNumber()
    ];
});
