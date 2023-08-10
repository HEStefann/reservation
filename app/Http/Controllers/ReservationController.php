<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use App\Models\Restaurant; // Don't forget to import the Restaurant model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class ReservationController extends Controller
{
    public function create()
    {
        $restaurants = Restaurant::all();

        return view('restaurant.reservation', compact('restaurants'));
    }

    public function getAvailableSeats($date)
    {
        $restaurant = Restaurant::find($restaurantId);
        $reservations = $restaurant->reservations()->whereDate('reservation_date', $date)->get();

        $reservedCount = $reservations->sum('reserved_people');
        $availableCount = $restaurant->capacity - $reservedCount;

        return response()->json([
            'reservedCount' => $reservedCount,
            'availableCount' => $availableCount
        ]);
    }

    public function index()
    {
        $reservations = Reservation::all();
        $restaurants = Restaurant::all();
        $restaurantId = $restaurants->first()->id;

        // Calculate the total number of people reserved for all restaurants
        $reservedCount = $reservations->sum('number_of_people');

        // Get the specific restaurant's total available people
        $restaurant = Restaurant::find($restaurantId);
        $availableCount = $restaurant->available_people;

        // Calculate the number of available seats for the specific restaurant
        $availableSeats = $availableCount - $reservedCount;

        return view('dashboard', compact('reservations', 'restaurants', 'restaurantId', 'reservedCount', 'availableCount', 'availableSeats'));
    }

    public function edit(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update($request->all());

        return redirect()->back()->with('success', 'Reservation updated!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('dashboard')->with('success', 'Reservation deleted successfully');
    }

    public function history(Request $request)
    {
        $selectedRestaurantId = $request->query('restaurant_id');
        $restaurants = Restaurant::all();
        $restaurantId = $selectedRestaurantId ?? $restaurants->first()->id;

        $reservations = Reservation::where('restaurant_id', $restaurantId)->get();

        // Calculate the total number of people reserved for the selected restaurant
        $reservedCount = $reservations->sum('number_of_people');

        // Get the specific restaurant's total available people
        $restaurant = Restaurant::find($restaurantId);
        $availableCount = $restaurant->available_people;

        // Calculate the number of available seats for the specific restaurant
        $availableSeats = $availableCount - $reservedCount;

        return view('history', compact('reservations', 'restaurants', 'restaurantId', 'reservedCount', 'availableCount', 'availableSeats'));
    }

    public function store(StoreReservationRequest $request)
    {
        $user = Auth::user();

        $restaurant = Restaurant::findOrFail($request->input('restaurant_id'));

        $reservedCount = Reservation::where('restaurant_id', $restaurant->id)
            ->whereDate('date', $request->input('date'))
            ->sum('number_of_people');

        $availableCount = $restaurant->available_people - $reservedCount;

        if ($request->input('number_of_people') > $availableCount) {
            return redirect()
                ->back()
                ->withErrors(['number_of_people' => 'Not enough available seats for this date and time']);
        }

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'restaurant_id' => $request->input('restaurant_id'),
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'deposit' => $request->input('deposit'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'number_of_people' => $request->input('number_of_people'),
            'note' => $request->input('note')
        ]);

        return redirect()
            ->route('dashboard', ['reservation' => $reservation->id])
            ->with('success', 'Reservation created successfully');
    }



    public function showReservationPage($restaurantId)
    {
        // Retrieve the restaurant data based on the $restaurantId (you might have a different logic here)
        $restaurant = Restaurant::find($restaurantId);

        // Pass the $restaurantId and $restaurant variables to the view
        return view('dashboard', compact('restaurantId', 'restaurant'));
    }

    // In your controller

    public function calendar(Request $request)
    {

        $status = $request->input('status');

        // Query reservations based on status
        $reservations = Reservation::where('status', $status)->get();

        // Pass reservations to calendar view
        return view('calendar', compact('reservations'));
    }


    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'full_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'deposit' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required|string',
            'number_of_people' => 'required|integer',
            'note' => 'nullable|string|max:255',
        ]);

        $user = Auth::user(); // Get the authenticated user

        $restaurant = Restaurant::findOrFail($reservation->restaurant_id);
        $reservedCount = Reservation::where('restaurant_id', $restaurant->id)->where('id', '!=', $reservation->id)->sum('number_of_people');
        $availableCount = $restaurant->available_people - $reservedCount;

        if ($request->input('number_of_people') > $availableCount) {
            return redirect()->back()->withErrors(['number_of_people' => 'Not enough available seats for the reservation']);
        }

        // Update the reservation with the new details
        $reservation->update([
            'user_id' => $user->id, // Assign the user's ID to the reservation
            'full_name' => $request->input('full_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'deposit' => $request->input('deposit'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'number_of_people' => $request->input('number_of_people'),
            'note' => $request->input('note'),
        ]);

        return redirect()->route('dashboard', ['reservation' => $reservation->id])
            ->with('success', 'Reservation updated successfully');
    }


    // Add other methods for updating, deleting, or listing reservations if needed
}
