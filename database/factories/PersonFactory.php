<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Person::class, function (Faker $faker) {
    $name =$faker->firstName;
    $surname = $faker->lastName;

    $nameComplete = $name . " " . $surname;
    return [
        'name' => $name,
        'surname' => $surname,
        'nameComplete' => $nameComplete,
        'dni' => $faker->phoneNumber, // password
        'cuil' => $faker->phoneNumber,
        'burndate' => $faker->dateTime,
    ];
});




