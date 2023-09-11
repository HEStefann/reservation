<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\WorkingHour;
use App\Models\RestaurantImage;
use App\Models\Image;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $realRestaurantData = [
            [
                'name' => 'Burger King',
                'address' => 'Ss Cyril & Methodius 13, Skopje 1000',
                'image' => 'https://logowik.com/content/uploads/images/310_burgerking.jpg',
            ],
            [
                'name' => 'McDonald\'s',
                'address' => '456 Elm St',
                'image' => 'https://blog.logomyway.com/wp-content/uploads/2017/01/mcdonalds-logo-1.jpg',
            ],
            [
                'name' => 'KFC',
                'address' => 'City Mall (Food Corner, Ljubljanska 4, Skopje 1000)',
                'image' => 'https://www.pngkit.com/png/detail/50-508776_kfc-logo.png',
            ],
            [
                'name' => 'Domino\'s Pizza',
                'address' => 'Dimitrie Cupovski 26, Skopje 1000',
                'image' => 'https://conceptstore.co.uk/wp-content/uploads/2015/04/dominos-logo1.jpg',
            ],
            // Add more real restaurant data here
        ];

        foreach ($realRestaurantData as $restaurantData) {
            // Generate the user
            $user = User::create([
                'name' => $restaurantData['name'],
                'email' => strtolower(str_replace(' ', '', $restaurantData['name'])) . '@info.com',
                'password' => bcrypt('password'),
                'role' => 'owner',
            ]);

            // Generate the restaurant using real restaurant data
            $restaurant = Restaurant::create([
                'title' => $restaurantData['name'],
                'address' => $restaurantData['address'],
                'user_id' => $user->id,
                'rating' => rand(1, 5),
                'recomended' => rand(0, 1),
            ]);

            // Generate working hours for the restaurant
            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach ($daysOfWeek as $day) {
                WorkingHour::create([
                    'restaurant_id' => $restaurant->id,
                    'day_of_week' => $day,
                    'opening_time' => '08:00',
                    'closing_time' => '18:00',
                ]);
            }

            // Generate a restaurant image
            RestaurantImage::create([
                'restaurant_id' => $restaurant->id,
                'image_url' => $restaurantData['image'],
                'display_order' => 1,
            ]);

            Image::create([
                'restaurant_id' => $restaurant->id,
                'image_url' => $restaurantData['image'],
            ]);

            for ($i = 0; $i < 10; $i++) {
                $guestUser = User::create([
                    'name' => 'guestreview ' . ($i + 1),
                    'email' => 'guestreview' . Str::random(10) . '@example.com',
                    'password' => Hash::make('password'),
                    'role' => 'guest',
                ]);

                // Create a reservation for the guest user
                $reservation = Reservation::create([
                    'full_name' => $guestUser->name,
                    'phone_number' => rand(1000000000, 9999999999),
                    'email' => $guestUser->email,
                    'deposit' => rand(100, 1000),
                    'date' => now(), // Use current date
                    'time' => now()->format('H:i'), // Use current time
                    'number_of_people' => rand(1, 10),
                    'note' => 'Testing note',
                    'user_id' => $guestUser->id,
                    'restaurant_id' => $restaurant->id,
                ]);

                // Leave a review for the restaurant associated with the reservation
                $guestReview = Review::create([
                    'restaurant_id' => $restaurant->id,
                    'user_id' => $guestUser->id,
                    'reservation_id' => $reservation->id,
                    'rating' => rand(1, 5),
                    'description' => 'This restaurant is great!',
                ]);
            }
        }
    }
}