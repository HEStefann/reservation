<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            [
                'name' => 'Parking',
            ],
            [
                'name' => 'Chinese Food',
            ],
            [
                'name' => 'French Cuisine',
            ],
            [
                'name' => 'Italian Food',
            ],
            [
                'name' => 'Seafood',
            ],
            [
                'name' => 'Vegetarian',
            ],
            [
                'name' => 'Vegan',
            ],
            [
                'name' => 'Gluten Free',
            ],
            [
                'name' => 'Halal',
            ],
            [
                'name' => 'Kosher',
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
