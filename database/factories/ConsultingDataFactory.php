<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\ConsultingData;
use Faker\Generator as Faker;


$factory->define(ConsultingData::class, function (Faker $faker) {
    $consultingTypes = [
        'ressources humaines',
        'gestion financières',
        'système d\'information'
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

    $consultingDomains = [
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

    return [
        'five_years_survival_rate' => $faker->numberBetween(0, 100),
        'consulting_type' => $faker->randomElement($consultingTypes),
        'funding_help' => $faker->boolean,
        'company_type' => $faker->randomElement($companyType),
        'consulting_domain' => $faker->randomElement($consultingDomains),
        'seeking_location' => 'France'
    ];
});
