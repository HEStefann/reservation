<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('name');
        $query = Restaurant::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $restaurants = Restaurant::all(); // Assuming you have a Restaurant model

        // Fetch promotions (you might want to adjust this query based on your logic)
        $promotions = Promotion::all();

        return view('user.home', [
            'restaurants' => $restaurants,
            'search' => $search,
            'promotions' => $promotions,
        ]);
    }

    public function page2(Request $request)
    {
        $searchTerm = $request->input('searchRestaurant');

        $restaurants = Restaurant::where('title', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        return view('user.restaurantspage', [
            'restaurants' => $restaurants,
            'searchTerm' => $searchTerm, // Pass the search term to the view
        ]);
    }

    public function favorite(Restaurant $restaurant)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has already favorited the restaurant
        if ($user->favorites()->where('restaurant_id', $restaurant->id)->exists()) {
            // Remove the restaurant from the user's favorites
            $user->favorites()->detach($restaurant->id);
        } else {
            // Add the restaurant to the user's favorites
            $user->favorites()->attach($restaurant->id);
        }

        return redirect()->back();
    }
}
