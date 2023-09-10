<?php

namespace Database\Factories;

use App\Models\RestaurantImage;
use Faker\Generator as Faker;

$factory->define(RestaurantImage::class, function (Faker $faker) {
    return [
        'restaurant_id' => null, // We'll assign the restaurant ID later
        'image_url' => $faker->imageUrl(),
        'display_order' => 1,
        'created_at' => now(),
        'updated_at' => null,
        'deleted_at' => null,
    ];
});
