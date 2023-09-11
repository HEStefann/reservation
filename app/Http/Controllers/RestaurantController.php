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
        $restaurant = Restaurant::with('reviews', 'activeMenu.categories.products')->findOrFail($id);
        $fourProducts = $restaurant->activeMenu->categories->pluck('products')->flatten(1)->take(4);
        return view('user.restaurant', ['restaurant' => $restaurant, 'fourProducts' => $fourProducts]);
    }

    public function store(RestaurantRequest $request)
{
    // Create restaurant
    $validatedData = $request->validated();
    $restaurant = $this->restaurantService->createRestaurant($validatedData);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');

        // Create a new restaurant image record associated with the restaurant
        $restaurant->images()->create([
            'image_url' => $imagePath,
            'display_order' => 1, // Adjust the display order as needed
        ]);
    }

    // Get authenticated user
    $user = Auth::user();

    // Create moderator record
    Moderator::create([
        'user_id' => $user->id,
        'restaurant_id' => $restaurant->id,
        'role' => 'owner',
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
        $nearestRestaurants = Restaurant::whereBetween('lat', [$minLatitude, $maxLatitude])
            ->whereBetween('lng', [$minLongitude, $maxLongitude])
            ->get();

        // Check if any restaurants were found
        if ($nearestRestaurants->isEmpty()) {
            // Handle the scenario when no restaurants are found
            return $response = [
        'message' => '<div class=\'inline-flex items-center\'><svg class=\'w-5 h-5 mr-1 text-gray-500\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 22 22\'><path d=\'M10.0835 6.41732H11.9168V8.25065H10.0835V6.41732ZM10.0835 10.084H11.9168V15.584H10.0835V10.084ZM11.0002 1.83398C5.94016 1.83398 1.8335 5.94065 1.8335 11.0007C1.8335 16.0607 5.94016 20.1673 11.0002 20.1673C16.0602 20.1673 20.1668 16.0607 20.1668 11.0007C20.1668 5.94065 16.0602 1.83398 11.0002 1.83398ZM11.0002 18.334C6.95766 18.334 3.66683 15.0431 3.66683 11.0007C3.66683 6.95815 6.95766 3.66732 11.0002 3.66732C15.0427 3.66732 18.3335 6.95815 18.3335 11.0007C18.3335 15.0431 15.0427 18.334 11.0002 18.334Z\' fill=\'#938F99\'></path></svg><p class=\'text-xs font-light text-left text-gray-500\'>No restaurants found</p></div>'
    ];
        }
        // Calculate the distance for each restaurant
        $nearestRestaurants->each(function ($restaurant) use ($latitude, $longitude) {
            $restaurant->distance = $this->calculateDistance($latitude, $longitude, $restaurant->lat, $restaurant->lng);
        });
        // return json from rendered shownearestrestaurants component
        return response()->json(['html' => view('components.show-nearest-restaurants', ['restaurants' => $nearestRestaurants])->render()]);
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
