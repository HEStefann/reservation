<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    public function index($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('user.reservation', compact('restaurant'));
    }
}
