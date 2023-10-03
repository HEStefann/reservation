<?php

namespace App\Http\Controllers\Restaurant;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantCalendarController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        // check for getter choosenDate if is set then give only reservations for that day
        // if(request()->has('choosenDate')) {
        //     $choosenDate = request()->choosenDate;
        //     $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant->with(['reservations' => function($query) use ($choosenDate) {
        //         $query->whereDate('date', $choosenDate);
        //     }])->first();
        //     return view('restaurant.calendar', compact('restaurant'));
        // }
        $reservation = Reservation::where('user_id', $user->id)->first();
        $moderator = Moderator::where('user_id', $user->id)->first();
        $restaurant = Restaurant::with('reservations')->find($moderator->restaurant_id);
        return view('restaurant.calendar', compact('restaurant', 'reservation'));
    }

    public function search(Request $request)
    {
        $searchText = $request->query('term');

        // Perform the search based on the $searchText
        $searchResults = Reservation::where('full_name', 'like', '%' . $searchText . '%')
            ->orWhere('email', 'like', '%' . $searchText . '%')
            ->get();

        // Retrieve the restaurant associated with the logged-in user
        $user = auth()->user();
        $restaurant = $user->restaurant;

        // Return the search results as JSON
        return response()->json([
            'restaurant' => $restaurant,
            'searchResults' => $searchResults
        ]);
    }

    public function showReservationsForDate($selectedDate)
    {
        $user = auth()->user();
        $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant->with(['reservations' => function ($query) use ($selectedDate) {
            $query->whereDate('date', $selectedDate);
        }])->get();
        return response()->json($restaurant);
    }
}
