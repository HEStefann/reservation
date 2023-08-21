<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Moderator;
use App\Models\Restaurant;
use App\Services\RestaurantService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function show($id)
    {
        // restaurant with reviews
        $restaurant = Restaurant::with('reviews')->findOrFail($id);

        return view('user.restaurant', compact('restaurant'));
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
            'role' => 'owner',
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);

        // Update user role
        DB::table('users')
            ->where('id', $user->id)
            ->update(['role' => 'owner']);

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id]);
    }
    public function getNearestRestaurants(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        
        // Calculate the bounding box coordinates for the 2km radius
        $earthRadius = 6371; // Earth's radius in kilometers
        $radius = 2; // Radius in kilometers
        
        $minLatitude = $latitude - ($radius / $earthRadius) * (180 / pi());
        $maxLatitude = $latitude + ($radius / $earthRadius) * (180 / pi());
        
        $minLongitude = $longitude - ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));
        $maxLongitude = $longitude + ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));
        
        // Find the nearest restaurants within the bounding box coordinates
        $nearestRestaurants = Restaurant::select('title', 'lat', 'lng')
            ->whereBetween('lat', [$minLatitude, $maxLatitude])
            ->whereBetween('lng', [$minLongitude, $maxLongitude])
            ->get();

        // Calculate the distance for each restaurant
        $nearestRestaurants->each(function ($restaurant) use ($latitude, $longitude) {
            $restaurant->distance = $this->calculateDistance($latitude, $longitude, $restaurant->lat, $restaurant->lng);
        });

        // Check if any restaurants were found
        if ($nearestRestaurants->isEmpty()) {
            // Handle the scenario when no restaurants are found
            return response()->json(['message' => 'No restaurants found']);
        }

        return response()->json($nearestRestaurants);
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Radius of the earth in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; // Distance in kilometers

        return $distance;
    }
}
