<?php

namespace Database\Factories;

use App\Models\WorkingHours;
use Faker\Generator as Faker;

$factory->define(WorkingHours::class, function (Faker $faker) {
    return [
        'restaurant_id' => null, // We'll assign the restaurant ID later
        'day_of_week' => $faker->randomElement(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']),
        'work_date' => $faker->date(),
        'opening_time' => $faker->time(),
        'closing_time' => $faker->time(),
        'default_working_time' => $faker->boolean(),
        'available_people' => $faker->numberBetween(0, 10),
        'created_at' => now(),
        'updated_at' => null,
        'deleted_at' => null,
        'is_working' => $faker->boolean(),
    ];
});
