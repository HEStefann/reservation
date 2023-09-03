<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 



class UserReservationController extends Controller
{
    public function index($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('user.reservation', compact('restaurant'));
    }
    
public function store(StoreReservationRequest $request)
{
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

    Reservation::create([
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
        'status' => 'pending'
    ]);

    // Flash a success message to the session
    Session::flash('reservation_success', 'Reservation was successfully made!');

    return redirect('/');
}

}
