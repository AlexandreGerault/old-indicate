<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->realText(250),
    ];
});
