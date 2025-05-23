<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use App\Models\Place;
use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'star' => $faker->numberBetween($min = 1, $max = 5),
        'comment' => $faker->paragraph,
        'status' => 1,
        'place_id' => 1,
        'customer_id' => 1,
    ];
});
