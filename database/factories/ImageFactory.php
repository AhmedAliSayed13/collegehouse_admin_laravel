<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Terpx_image::class, function (Faker $faker) {
    return [
        'name' => 'img.png',
        'product_id' => $faker->numberBetween($min = 1, $max = 200),
    ];
});
