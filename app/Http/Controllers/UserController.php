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

        $restaurants = $query->paginate(3);

        // Fetch promotions (you might want to adjust this query based on your logic)
        $promotions = Promotion::all();

        return view('user.restaurants', [
            'restaurants' => $restaurants,
            'search' => $search,
            'promotions' => $promotions,
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
