<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create()
    {
        return view('restaurant.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'available_people' => 'required|integer|min:1',
            'operating_status' => 'required|in:Open,Closed',
            'working_hours' => 'required|array',
            'working_hours.*.day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'working_hours.*.opening_time' => 'required|date_format:H:i',
            'working_hours.*.closing_time' => 'required|date_format:H:i',
        ]);

        $restaurant = Restaurant::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'available_people' => $validatedData['available_people'],
            'operating_status' => $validatedData['operating_status'],
        ]);

        foreach ($validatedData['working_hours'] as $workingHourData) {
            $restaurant->workingHours()->create([
                'day_of_week' => $workingHourData['day'],
                'opening_time' => $workingHourData['opening_time'],
                'closing_time' => $workingHourData['closing_time'],
                'default_working_time' => 1,
            ]);
        }

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id]);
    }
}
