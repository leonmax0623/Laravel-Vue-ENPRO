<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EnproTool;
use Faker\Generator as Faker;

$factory->define(EnproTool::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence
    ];
});
