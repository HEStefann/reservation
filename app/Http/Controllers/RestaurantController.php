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
            'working_hours' => 'required|array',
            'working_hours.*.day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'working_hours.*.opening_time' => 'required|date_format:H:i',
            'working_hours.*.closing_time' => 'required|date_format:H:i',
        ]);

        // Create the restaurant for the logged-in user
        $restaurant = Restaurant::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Handle working hours
        $workingHours = $request->input('working_hours');
        $restaurant->saveWorkingHours($workingHours);

        // Remove the dd statement below
        // dd($request->input('working_hours'));

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id]);
    }

}
