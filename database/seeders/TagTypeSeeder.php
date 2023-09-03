<?php

namespace Database\Seeders;

use App\Models\TagType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagType::create(['name' => 'Feature']);
        TagType::create(['name' => 'Cuisine']);
    }
}
