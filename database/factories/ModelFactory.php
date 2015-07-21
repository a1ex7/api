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
        'title' => 'Mission' . $faker->randomNumber(2),
        'status' => $faker->randomElement(['planned', 'executed', 'completed', 'canceled']),
    ];
});

$factory->define(App\Target::class, function ($faker) {
    return [
        'type' => 'Target' . $faker->randomNumber(2),
        'status' => $faker->randomElement(['planned', 'performed', 'achieved', 'canceled']),
        'mission_id' => 1,
    ];
});

$factory->define(App\Employee::class, function ($faker) {
    return [
        'name' => $faker->name,
        'position' => 'position' . $faker->randomNumber(4),
        'mission_id' => 1,
    ];
});
