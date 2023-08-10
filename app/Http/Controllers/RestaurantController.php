<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use App\Services\RestaurantService;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    protected $restaurantService;

    public function dashboard()
    {
        $restaurants = Restaurant::all();

        return view('dashboard', ['restaurants' => $restaurants]);
    }

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function create()
    {
        return view('restaurant.register');
    }

    public function store(RestaurantRequest $request)
    {
        $restaurant = $this->restaurantService->createRestaurant($request->validated());

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id]);
    }
}
