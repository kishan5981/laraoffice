<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ReviewImage;
use Faker\Generator as Faker;

$factory->define(ReviewImage::class, function (Faker $faker) {
    return [
        'source' => '/documents/images_(1)19655074031599638656.jpeg',
        'type' => 'jpeg',
        'review_id' => 93 //$faker->numberBetween($min = 1, $max = 100),
    ];
});
