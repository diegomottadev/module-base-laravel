<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker,$params) {
    return [
        'name' => $faker->city,
        'province_id' => $params['province_id'],
    ];
});