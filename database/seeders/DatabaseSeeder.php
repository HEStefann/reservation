<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\WorkingHour;
use App\Models\Image;
use App\Models\RestaurantImage;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TagTypeSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(RestaurantSeeder::class);

        
    }
}
