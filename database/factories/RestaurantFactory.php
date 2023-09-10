<?php

// database/factories/RestaurantFactory.php
namespace Database\Factories;

use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'address' => $faker->address,
        'rating' => $faker->randomFloat(1, 1, 5),
        'average_price' => $faker->numberBetween(1, 100),
        'recomended' => $faker->numberBetween(1, 10),
        'created_at' => now(),
        'updated_at' => null,
        'deleted_at' => null,
        'available_people' => 1,
        'operating_status' => 'Open',
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'user_id' => null, // We'll assign the user ID later
    ];
});
