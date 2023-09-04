<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Http;



class UserController extends Controller
{
    public function show()
{
    $user = auth()->user(); // Get the currently authenticated user
    return view('userprofile', compact('user'));
}

public function edit()
{
    $user = auth()->user(); // Get the currently authenticated user
    return view('editpersonalinfo', compact('user'));
}

public function favourites()
{
    $user = auth()->user(); // Get the currently authenticated user
    $favorites = $user->favorites;
    return view('userfavourites', compact('user', 'favorites'));
}



    public function index(Request $request)
    {

        $restaurants = Restaurant::all(); // Assuming you have a Restaurant model

        // Fetch promotions (you might want to adjust this query based on your logic)
        $promotions = Promotion::all();

        return view('user.index', [
            'restaurants' => $restaurants,
            // 'search' => $search,
            'promotions' => $promotions,
        ]);
    }

public function update(ProfileUpdateRequest $request)
{
    // The request has already been validated using the ProfileUpdateRequest rules

    // Update the user's information
    $user = auth()->user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    // Add any other fields you need to update
    $user->save();

    // Redirect back with a success message
    return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
}


public function search(Request $request)
{
    $searchAddress = $request->input('searchLocation');
    $searchTitle = $request->input('searchRestaurant');

    // Initialize a variable to store the displayed address
    $displayedAddress = '';

    if ($searchAddress) {
        // Use Google Maps Geocoding API to get coordinates for the search address
        $coordinates = $this->getCoordinatesFromGoogleMaps($searchAddress);

        if ($coordinates) {
            $latitude = $coordinates['lat'];
            $longitude = $coordinates['lng'];

            // Calculate the bounding box coordinates for the 2km radius
            $earthRadius = 6371; // Earth's radius in kilometers
            $radius = 2; // Radius in kilometers

            $minLatitude = $latitude - ($radius / $earthRadius) * (180 / pi());
            $maxLatitude = $latitude + ($radius / $earthRadius) * (180 / pi());

            $minLongitude = $longitude - ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));
            $maxLongitude = $longitude + ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));

            // Query your database for restaurants within the bounding box
            $restaurants = Restaurant::whereBetween('lat', [$minLatitude, $maxLatitude])
                ->whereBetween('lng', [$minLongitude, $maxLongitude])
                ->get();

            // Set the displayed address to the searched address
            $displayedAddress = $searchAddress;
        } else {
            // Handle the case where the address couldn't be geocoded
            $restaurants = [];
        }
    } elseif ($searchTitle) {
        // Search by restaurant name
        $restaurants = Restaurant::where('title', 'LIKE', '%' . $searchTitle . '%')->get();
    } else {
        // Handle the case where neither address nor restaurant name is provided
        $restaurants = Restaurant::all(); // You can change this to your default behavior
    }

    return view('user.restaurantspage', [
        'restaurants' => $restaurants,
        'searchAddress' => $displayedAddress, // Use the displayed address here
        'searchTitle' => $searchTitle,
    ]);
}

private function getCoordinatesFromGoogleMaps($address)
{
    $apiKey = 'AIzaSyBopOp_b1Mmr-_8iWcxjrNueAKsVgUoIMU';
    $formattedAddress = urlencode($address);

    $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json?address={$formattedAddress}&key={$apiKey}");
    
    if ($response->successful()) {
        $data = $response->json();

        if ($data['status'] === 'OK' && isset($data['results'][0]['geometry']['location'])) {
            return $data['results'][0]['geometry']['location'];
        }
    }

    return null;
}


    public function favorite(Restaurant $restaurant)
    {
        // get user
        $user = Auth::user();

        // Check if the user has already favorited the restaurant
        if ($user->isFavorite($restaurant)) {
            // Remove the restaurant from the user's favorites
            $user->unfavorite($restaurant);
        } else {
            // Add the restaurant to the user's favorites
            $user->favorite($restaurant);
            
        }

        return redirect()->back();
    }

    // userreservations
    public function reservations()
    {
        $user = auth()->user(); // Get the currently authenticated user
        $reservations = $user->reservations;
        return view('userreservations', compact('user', 'reservations'));
    }
}
