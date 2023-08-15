<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Moderator;
use App\Models\Notification;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
        $notifications = Notification::where('user_id', Auth::id())->get();
        return view('dashboard', compact('reservations', 'restaurants', 'restaurantId', 'reservedCount', 'availableCount', 'availableSeats', 'notifications'));
    }

    public function edit(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update($request->all());

        return redirect()->back()->with('success', 'Reservation updated!');
    }

    public function destroy($id)
    {
        // Find the reservation
        $reservation = Reservation::findOrFail($id);

        // Delete the reservation
        $reservation->delete();

        // Redirect back to the reservations page with a success message
        return redirect()->route('history')->with('success', 'Reservation deleted successfully.');
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
        $status = $user->role == 'owner' || $user->role == 'moderator' ? 'accepted' : 'pending';
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
            'note' => $request->input('note'),
            'status' => $status
        ]);
        // Create a notification for the moderator of the restaurant
        $moderator = Moderator::where('restaurant_id', $request->input('restaurant_id'))->first();
        Notification::create([
            'user_id' => $moderator->user_id,
            'reservation_id' => $reservation->id,
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

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        // Validate input
        $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'deposit' => 'required|numeric|min:0',
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|numeric|min:1',
            'note' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        // Check available seats
        $availableCount = $reservation->restaurant->available_people;
        if ($request->input('number_of_people') > $availableCount) {
            return redirect()->back()->withErrors(['number_of_people' => 'Not enough available seats for the reservation']);
        }

        // Update reservation details
        $reservation->full_name = $request->input('full_name');
        $reservation->phone_number = $request->input('phone_number');
        $reservation->email = $request->input('email');
        $reservation->deposit = $request->input('deposit');
        $reservation->date = $request->input('date');
        $reservation->time = $request->input('time');
        $reservation->number_of_people = $request->input('number_of_people');
        $reservation->note = $request->input('note');
        $reservation->status = $request->input('status');
        $reservation->save();

        return response('Reservation updated', 200);
    }

    public function edit2(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update2(Request $request, $id)
    {
        try {
            \Log::info($request->all()); // Log request data

            $reservation = Reservation::findOrFail($id);

            // Validate input
            $this->validate($request, [
                'full_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'deposit' => 'required|numeric|min:0',
                'date' => 'required|date',
                'time' => 'required',
                'number_of_people' => 'required|numeric|min:1',
                'note' => 'nullable|string',
                'status' => 'required|in:pending,accepted,declined'
            ]);

            // Check available seats
            $availableCount = $reservation->restaurant->available_people;
            if ($request->input('number_of_people') > $availableCount) {
                return redirect()->back()->withErrors(['number_of_people' => 'Not enough available seats for the reservation']);
            }

            $reservation->full_name = $request->input('full_name');
            $reservation->phone_number = $request->input('phone_number');
            $reservation->email = $request->input('email');
            $reservation->deposit = $request->input('deposit');
            $reservation->date = $request->input('date');
            $reservation->time = $request->input('time');
            $reservation->number_of_people = $request->input('number_of_people');
            $reservation->note = $request->input('note');
            $reservation->status = $request->input('status');
            $reservation->save();

            return redirect()->route('dashboard')->with('success', 'Reservation updated!');
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Error updating reservation: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating the reservation.');
        }

        // Add other methods for updating, deleting, or listing reservations if needed
    }
    public function updateStatus(Request $request, Reservation $reservation)
    {
        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->back();
    }
}
