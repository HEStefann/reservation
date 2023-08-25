<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class UserRestaurantsController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->search;

        $restaurants = Restaurant::where('title', 'LIKE', "%$searchTerm%")->get();

        return response()->json([
            'restaurants' => $restaurants
        ]);
    }
    public function searchRestaurants(Request $request) {

        $term = $request->input('term');
      
        $restaurants = Restaurant::where('name', 'like', "%$term%")->get();
      
        return response()->json([
          'restaurants' => $restaurants
        ]);
      
      }
}
