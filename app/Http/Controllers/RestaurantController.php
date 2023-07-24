<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\WorkingHour;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display the restaurant registration form.
     */
    public function create()
    {
        return view('restaurants.register');
    }

    /**
     * Handle the restaurant registration process.
     */

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'opening_time' => 'required|array',
        'closing_time' => 'required|array',
    ]);

    // Create the restaurant for the logged-in user
    $restaurant = Restaurant::create([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    // Define the days of the week in the desired order (Monday to Sunday)
    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    // Handle working hours
    $restaurant->saveWorkingHours($daysOfWeek, $request->input('opening_time'), $request->input('closing_time'));

    return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id]);
}

}