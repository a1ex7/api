<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Mission::class, function ($faker) {
    return [
        'title' => $faker->word,
        'status' => $faker->randomElement(['planned', 'executed', 'completed', 'canceled']),
    ];
});

$factory->define(App\Target::class, function ($faker) {
    return [
        'type' => $faker->word,
        'status' => $faker->randomElement(['planned', 'performed', 'achieved', 'canceled']),
    ];
});
