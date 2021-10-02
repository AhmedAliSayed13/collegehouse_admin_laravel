<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Terpx_type::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
    ];
});
