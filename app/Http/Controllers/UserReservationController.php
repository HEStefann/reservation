<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use Illuminate\Http\Request;


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

        $request->validate([
            'terms' => 'required'
        ]);

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

        return redirect()->route('user.reservation', $request->input('restaurant_id'))->with('success', 'Reservation created');
    }
}
