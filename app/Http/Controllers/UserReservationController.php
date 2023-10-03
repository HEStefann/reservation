<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreReservationRequest;
use App\Models\Floor;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class UserReservationController extends Controller
{
    public function index($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('user.reservation', compact('restaurant'));
    }

    public function store(UserStoreReservationRequest $request)
    {
        // check auth 
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['Please login to make a reservation.']);
        }

        $user = Auth::user();

        // Create a DateTime object for the selected date and time
        $selectedDateTime = \DateTime::createFromFormat('Y-m-d H:i', $request->input('date') . ' ' . $request->input('time'));

        // Get the current date and time
        $currentDateTime = new \DateTime();

        // Check if the selected date and time have already passed
        if ($selectedDateTime <= $currentDateTime) {
            $customError = 'Selected date and time have already passed.';

            // Use the "withErrors" method to add custom error messages
            return redirect()->back()->withErrors([$customError]);
        }

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'restaurant_id' => $request->input('restaurant_id'),
            'full_name' => $user->name,
            'phone_number' => $user->phone,
            'email' => $user->email,
            'deposit' => $request->input('deposit'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'number_of_people' => $request->input('number_of_people'),
            'note' => $request->input('note'),
            'status' => 'pending'
        ]);

        $selectedTables = $request->input('selectedTables');
        foreach ($selectedTables as $tableId) {
            if ($tableId != 0) {
                $reservation->tables()->attach($tableId);
            }
        }
        // Flash a success message to the session
        Session::flash('reservation_success', 'Reservation was successfully made!');

        // return redirect()->route('payment.index', ['reservation' => $reservation->id]);
        return redirect()->route('user.home');
    }
    public function showReservationsForDate($restaurantId, $selectedDate)
    {
        // Extract date components using regular expressions
        preg_match('/(\w{3}) (\w{3}) (\d{2}) (\d{4})/', $selectedDate, $matches);
        $day = $matches[3];
        $month = date('m', strtotime($matches[2]));
        $year = $matches[4];

        $parsedDate = Carbon::create($year, $month, $day)->subDay()->toDateString();

        $restaurant = Restaurant::findOrFail($restaurantId);
        $reservations = $restaurant->reservations()->whereDate('date', $parsedDate)->get();

        $reservedTimes = [];

        foreach ($reservations as $reservation) {
            $time = Carbon::parse($reservation->time)->format('H:i');
            $reservedTimes[] = $time;
        }

        return response()->json([
            'reservedTimes' => $reservedTimes
        ]);
    }
    public function getWorkingHours($restaurantId, $selectedDate)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        $workingHours = $restaurant->workingHours()->whereDate('work_date', $selectedDate)->first();
        if (!$workingHours) {
            $dayOfWeek = Carbon::parse($selectedDate)->format('l');
            $workingHours = $restaurant->workingHours()->where('default_working_time', 1)->where('day_of_week', $dayOfWeek)->first();
        }

        return response()->json([
            'opening_time' => $workingHours['opening_time'],
            'closing_time' => $workingHours['closing_time']
        ]);
    }


    public function checkFreeTables(Request $request)
    {
        $floorId = $request->input('floorId');
        $selectedDate = $request->input('date');
        $selectedTime = $request->input('time');

        $floor = Floor::findOrFail($floorId);
        $restaurantId = $floor->restaurant->first()->id;
        $reservations = whereDate('date', $selectedDate)->get();

        $reservedTables = [];

        foreach ($reservations as $reservation) {
            $tables = $reservation->tables;
            foreach ($tables as $table) {
                $reservedTables[] = $table->id;
            }
        }
        return response()->json([
            'reservedTables' => $restaurant->reservations()
        ]);
      
    public function delete(Request $request, Reservation $reservation)
    {
        $user = Auth::user();

        if ($reservation) {
            $reservation->delete();
            return redirect()->route('user.reservations');
        } else {
            // Handle the case where the reservation is not found
            return redirect()->route('user.reservations')->with('error', 'Reservation not found.');
        }
    }
}
