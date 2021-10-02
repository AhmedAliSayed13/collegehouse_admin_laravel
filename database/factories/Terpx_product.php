<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Terpx_product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'price' => $faker->randomDigit,
        'describe' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'location' => $faker->address,
        'category_id' => $faker->numberBetween($min = 1, $max = 10),
        'type_id' =>  $faker->numberBetween($min = 1, $max = 2),
        'user_id' =>  $faker->numberBetween($min = 1, $max = 102),
        'plan_id' =>  $faker->numberBetween($min = 1, $max = 3),
    ];
});
