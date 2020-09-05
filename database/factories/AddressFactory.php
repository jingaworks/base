<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Address;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'address' => $faker->address
    ];
});
