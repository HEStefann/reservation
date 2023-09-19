<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(BackgroundTypesSeeder::class);
        $this->call(BackgroundsSeeder::class);
        $this->call(ShapeGroupTypesSeeder::class);
        $this->call(ShapeTypesSeeder::class);
        $this->call(TableSizeSeeder::class);
        $this->call(FloorsTableSeeder::class);
        $this->call(TablesSeeder::class);
        $this->call(TagTypeSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(RestaurantSeeder::class);
    }
}
