<?php

namespace Tests\Unit;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $user = User::factory()->create(); // Create a User instance
        $restaurant = Restaurant::factory()->create(); // Create a Restaurant instance
    }
}
