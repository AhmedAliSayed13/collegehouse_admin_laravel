<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use \App\Model\Terpx_category;
use Faker\Generator as Faker;

$factory->define(\App\Models\Terpx_category::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
    ];
});
