<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Terpx_user::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'postal_code' => $faker->postcode,
        'password' => '$2y$10$wN/OoMc2sempSN8Kz3iFOOLSXz93UyJfkDahudqC39fXTSbWUID3e',
    ];
});
