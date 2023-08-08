<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Make sure to import your User model
use App\Models\Restaurant;

class UserController extends Controller
{
    public function index()
    {
        // Assuming you want to fetch and display restaurants associated with the user
        $user = auth()->user(); // Get the authenticated user

        // Assuming you have a relationship set up between User and Restaurant models
        $restaurants = Restaurant::paginate(3); // Paginate the results with 10 items per page

        return view('user.restaurants', compact('restaurants'));
    }
}
