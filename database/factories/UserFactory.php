<?php
namespace Database\Factories;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'email_verified_at' => null,
        'password' => bcrypt('password'), // Replace 'password' with the desired password
        'notes' => null,
        'role' => 'owner',
        'remember_token' => null,
        'created_at' => now(),
        'updated_at' => null,
        'deleted_at' => null,
    ];
});