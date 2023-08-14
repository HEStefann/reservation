<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Moderator;
use App\Models\Restaurant;
use App\Services\RestaurantService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        return view('user.showrestaurant', compact('restaurant'));
    }

    public function store(RestaurantRequest $request)
    {
        // Create restaurant
        $restaurant = $this->restaurantService->createRestaurant($request->validated());

        // Get authenticated user
        $user = Auth::user();

        // Create moderator record  
        Moderator::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant->id,
            'role' => 'owner'
        ]);

        // Update user role
        DB::table('users')
            ->where('id', $user->id)
            ->update(['role' => 'owner']);

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id]);
    }
}
