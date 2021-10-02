<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Terpx_attribute::class, function (Faker $faker) {
    return [
        'key' => $faker->name,
        'value' => $faker->firstName,
        'product_id' => $faker->numberBetween($min = 1, $max = 200)
    ];
});
