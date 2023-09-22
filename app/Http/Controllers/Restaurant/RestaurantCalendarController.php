<?php

namespace App\Http\Controllers\Restaurant;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use Illuminate\Http\Request;

class RestaurantCalendarController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $moderator = Moderator::where('user_id', $user->id)->first();
        $restaurant = $moderator->restaurant;

        // Get the selected date from the request or use the current date as the default
        $selectedDate = $request->input('date', Carbon::today()->toDateString());

        // Fetch reservations for the selected date
        $reservations = $restaurant->reservations()->whereDate('time', $selectedDate)->get();

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            // If it's an AJAX request, return a JSON response with the reservations
            return response()->json($reservations);
        }

        // If it's a regular request, return the view with the reservations
        return view('restaurant.calendar', compact('restaurant', 'reservations', 'selectedDate'));
    }
}
    