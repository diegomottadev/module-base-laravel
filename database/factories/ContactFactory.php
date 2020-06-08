<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\Person;
use App\User;
use Faker\Generator as Faker;

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

$factory->define(Contact::class, function (Faker $faker) {

    return [
        'email' => $faker->companyEmail,
        'web' => $faker->domainName,
        'telphone' =>  $faker->phoneNumber,
        'celphone' => $faker->phoneNumber, 
    ];
});

