<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Restaurant;

class UsersWithRestaurantsSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            Restaurant::create([
                'title' => "Restaurant of {$user->name}",
                'description' => "Description for {$user->name}'s restaurant",
                'address' => "Address of {$user->name}'s restaurant",
                'rating' => rand(1, 5),
                'available_people' => rand(10, 100),
                'operating_status' => rand(0, 1),
                'lat' => 'latitude_value',
                'lng' => 'longitude_value',
                'user_id' => $user->id,
            ]);
        });
    }
}
