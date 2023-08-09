<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Moderator;
use App\Models\Restaurant;
use App\Services\RestaurantService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    protected $restaurantService;

    public function dashboard()
    {
        // Fetch the restaurants from the database
        $restaurants = Restaurant::all(); // You can modify this query based on your needs

        // Other logic and variable assignments

        return view('dashboard', [
            'restaurants' => $restaurants, // Pass the $restaurants variable to the view
            // Other variables you want to pass to the view
        ]);
    }

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function create()
    {
        return view('restaurant.register');
    }

    public function store(RestaurantRequest $request)
    {
        // Create restaurant
        $restaurant = $this->restaurantService->createRestaurant($request->validated());

        // Get authenticated user
        $user = Auth::user();

        // Create moderator record  
        Moderator::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant->id,
            'role' => 'owner'
        ]);

        // Update user role
        DB::table('users')
            ->where('id', $user->id)
            ->update(['role' => 'moderator']);

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id]);
    }
}
