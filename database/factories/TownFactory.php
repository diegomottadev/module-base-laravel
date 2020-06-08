<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Town::class, function (Faker $faker,$params) {
    return [
        'name' => $faker->city,
        'city_id' => $params['city_id'],
    ];
});