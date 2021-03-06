<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Contact;
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

$factory->define(Person::class, function (Faker $faker,$params) {
    $name =$faker->firstName;
    $surname = $faker->lastName;

    $nameComplete = $name . " " . $surname;
    $contact = factory(Contact::class)->create();
    return [
        'name' => $name,
        'surname' => $surname,
        'nameComplete' => $nameComplete,
        'dni' => $faker->phoneNumber,
        'cuil' => $faker->phoneNumber,
        'burndate' => $faker->dateTime,
        'user_id' => null,
        'contact_id' =>$contact->id
    ];
});




