<?php

namespace App\Http\Controllers\Restaurant;

use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantCalendarController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $moderator = Moderator::where('user_id', $user->id)->first();
        $restaurant = Restaurant::find($moderator->restaurant_id);
        return view('restaurant.calendar', compact('restaurant'));
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

    public function showReservationsForDate($restaurantId, $selectedDate)
    {
        // check auth user id does exist in moderators
        $user = Auth::user();
        $restaurant = Restaurant::findOrFail($restaurantId);
        $moderators = $restaurant->moderators->pluck('user_id')->toArray();

        if (!in_array($user->id, $moderators)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }

        $reservations = $restaurant->reservations()->whereDate('date', $selectedDate)->with('tables:TableDescription')->get();
        return response()->json([
            'reservations' => $reservations
        ]);
    }
}
