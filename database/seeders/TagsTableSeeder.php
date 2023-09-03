<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TagType;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        // Get the Cuisine tag type
        $cuisineTagType = TagType::where('name', 'Cuisine')->first();
        $featureTagType = TagType::where('name', 'Feature')->first();

        Tag::create(['name' => 'Parking', 'tag_type_id' => $featureTagType->id]);
        Tag::create(['name' => 'Chinese Food', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'French Cuisine', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'Italian Food', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'Seafood', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'Vegetarian', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'Vegan', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'Gluten Free', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'Halal', 'tag_type_id' => $cuisineTagType->id]);
        Tag::create(['name' => 'Kosher', 'tag_type_id' => $cuisineTagType->id]);
    }
}
