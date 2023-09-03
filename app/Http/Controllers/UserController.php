<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;


class UserController extends Controller
{
    public function show()
{
    $user = auth()->user(); // Get the currently authenticated user
    return view('userprofile', compact('user'));
}

public function edit()
{
    $user = auth()->user(); // Get the currently authenticated user
    return view('editpersonalinfo', compact('user'));
}

public function favourites()
{
    $user = auth()->user(); // Get the currently authenticated user
    $favorites = $user->favorites;
    return view('userfavourites', compact('user', 'favorites'));
}



    public function index(Request $request)
    {

        $restaurants = Restaurant::all(); // Assuming you have a Restaurant model

        // Fetch promotions (you might want to adjust this query based on your logic)
        $promotions = Promotion::all();

        return view('user.index', [
            'restaurants' => $restaurants,
            // 'search' => $search,
            'promotions' => $promotions,
        ]);
    }

public function update(ProfileUpdateRequest $request)
{
    // The request has already been validated using the ProfileUpdateRequest rules

    // Update the user's information
    $user = auth()->user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    // Add any other fields you need to update
    $user->save();

    // Redirect back with a success message
    return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
}


    public function search(Request $request)
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
        // get user
        $user = Auth::user();

        // Check if the user has already favorited the restaurant
        if ($user->isFavorite($restaurant)) {
            // Remove the restaurant from the user's favorites
            $user->unfavorite($restaurant);
        } else {
            // Add the restaurant to the user's favorites
            $user->favorite($restaurant);
            
        }

        return redirect()->back();
    }

    // userreservations
    public function reservations()
    {
        $user = auth()->user(); // Get the currently authenticated user
        $reservations = $user->reservations;
        return view('userreservations', compact('user', 'reservations'));
    }
}
