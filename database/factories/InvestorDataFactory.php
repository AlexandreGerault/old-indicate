<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\InvestorData;
use Faker\Generator as Faker;

$factory->define(InvestorData::class, function (Faker $faker) {
    // Source : https://www.petite-entreprise.net/P-2749-88-G1-investissement-entreprise.html
    $fundingTypes = [
        'Investissement matériel',
        'Investissement immatériel',
        'Investissement financier',
        'Investissement de capacité',
        'Investissement de productivité',
        'Investissement de remplacement'
    ];

    $companyType = [
        'EURL',
        'SARL',
        'SNC',
        'SA',
        'SCS',
        'SCA',
        'GIE',
        'SELARL',
        'SAS',
        'SASU',
        'SCP',
        'Auto entrepreneur',
        'Micro entreprise'
    ];

    $fundingDomains = [
        'Agroalimentaire',
        'Banque/Assurance',
        'Bois/Papier/Carton/Imprimerie',
        'BTP/Matériaux de constructions',
        'Chimie/Parachimie',
        'Commerce/Négoce/Distribution',
        'Édition/Communication/Multimédia',
        'Électronique/Électricité',
        'Études et conseils',
        'Industrie pharmaceutique',
        'Informatique/Télécoms',
        'Machines et équipements/Automobiles',
        'Métallurgie/Travail du métal',
        'Plastique/Caoutchouc',
        'Services aux entreprises',
        'Textile/Habillement/Chaussures',
        'Transport/Logistique'
    ];

    $fundingMin = $faker->randomNumber(2);
    return [
        'funding_domain' => $faker->randomElement($fundingDomains),
        'company_type' => $faker->randomElement($companyType),
        'funding_min' => $fundingMin,
        'funding_max' => $faker->numberBetween($fundingMin, $faker->randomNumber(3)),
        'funding_location' => 'France',
        'provide_consulting' => $faker->boolean,
        'financial_means' => $faker->randomNumber(),
        'funding_type' => $faker->randomElement($fundingTypes)
    ];
});
