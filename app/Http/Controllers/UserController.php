<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Make sure to import your User model
use App\Models\Restaurant;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('name');
        $query = Restaurant::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $restaurants = $query->paginate(3);

        return view('user.restaurants', ['restaurants' => $restaurants, 'search' => $search]);
    }
}
