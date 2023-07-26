<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create()
    {
        return view('restaurants.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'available_people' => 'required|integer|min:1',
            'operating_status' => 'required|string|in:Open,Closed',
            'working_hours' => 'required|array',
            'working_hours.*.day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'working_hours.*.opening_time' => 'required|date_format:H:i',
            'working_hours.*.closing_time' => 'required|date_format:H:i',
        ]);

        $restaurant = Restaurant::create([
            'title' => $request->title,
            'description' => $request->description,
            'available_people' => $request->available_people, 
            'operating_status' => $request->operating_status,
        ]);

        // Handle working hours
        $workingHours = $request->input('working_hours');
        $restaurant->saveWorkingHours($workingHours);

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id]);
    }
}
