<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantLoginController extends Controller
{
    public function create()
    {
        if (auth()->user()) {
            if (auth()->user()->restaurant) {
                return redirect()->route('restaurant.dashboard');
            } else {
                return redirect()->route('restaurant.registerpage');
            }
        }
        return view('restaurant.loginpage');
    }
}
