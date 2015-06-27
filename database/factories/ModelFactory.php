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

$factory->define(Fuellog\User::class, function ($faker) {
    return [
        'name'                  => $faker->name,
        'email'                 => $faker->email,
        'password'              => str_random(10),
        'remember_token'        => str_random(10),
    ];
});

$factory->define(Fuellog\Vehicle::class, function ($faker) {
    return [
        'name'             => $faker->name,
        'color'            => $faker->hexcolor,
        'initial_odometer' => $faker->randomFloat(2)
    ];
});

$factory->define(Fuellog\Log::class, function ($faker) {
    return [
        'log_date'      => $faker->date,
        'fueled_units'  => $faker->randomNumber(3),
        'driven_units'  => $faker->randomNumber,
        'cost_per_unit' => $faker->randomFloat(2),
        'cost_total'    => $faker->randomFloat(2),
        'longtitude'    => $faker->randomNumber,
        'latitude'      => $faker->randomNumber,
        'vehicle_id'    => $faker->randomNumber,
        'average_usage' => $faker->randomFloat(2)
    ];
});
