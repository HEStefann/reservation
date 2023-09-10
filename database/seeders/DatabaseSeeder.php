<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\WorkingHour;
use App\Models\Image;
use App\Models\RestaurantImage;
use Illuminate\Database\Seeder;
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

    //     for ($i = 1; $i <= 10; $i++) {
    //         // Generate the user
    //         $user = new User();
    //         $user->name = 'User ' . $i;
    //         $user->email = 'user' . $i . '@example.com';
    //         $user->password = bcrypt('password');
    //         $user->save();
        
    //         // Generate the restaurant
    //         $restaurant = new Restaurant();
    //         $restaurant->title = 'Restaurant ' . $i;
    //         $restaurant->address = 'Address ' . $i;
    //         $restaurant->user_id = $user->id;
    //         $restaurant->rating = rand(1, 5); // Generate a random rating between 1 and 5
    //         $restaurant->recomended = rand(0, 1);
    //         $restaurant->save();
        
    //         // Generate working hours for the restaurant
    //         $workingHours = new WorkingHour();
    //         $workingHours->restaurant_id = $restaurant->id;
    //         $workingHours->day_of_week = 'Monday';
    //         $workingHours->opening_time = '08:00';
    //         $workingHours->closing_time = '18:00';
    //         $workingHours->save();
        
    //         // Generate a restaurant image
    //         $restaurantImage = new RestaurantImage();
    //         $restaurantImage->restaurant_id = $restaurant->id;
    //         $restaurantImage->image_url = 'images/photo-1517248135467-4c7edcad34c4.jpg';
    //         $restaurantImage->display_order = 1;
    //         $restaurantImage->save();
        
    //         $restaurantImage = new Image();
    //         $restaurantImage->restaurant_id = $restaurant->id;
    //         $restaurantImage->image_url = 'images/photo-1517248135467-4c7edcad34c4.jpg';
    //         $restaurantImage->save();
    //     }
    // }
    }
}