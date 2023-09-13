<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantReservationController extends Controller
{
    public function index()
    {
        return view('restaurant.reservations');
    }
}
