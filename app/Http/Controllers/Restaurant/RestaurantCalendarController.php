<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use Illuminate\Http\Request;

class RestaurantCalendarController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant->with('reservations')->first();
        return view('restaurant.calendar', compact('restaurant'));
    }
}
