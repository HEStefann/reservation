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
    public function index(Request $request)
    {

        $restaurants = Restaurant::all();

        $promotions = Promotion::all();

        $highliyRated = Restaurant::where('rating', '>=', 4)->get();
        $recommendedRestaurants = Restaurant::where('recomended', '>', 0)->orderBy('recomended', 'asc')->get();
        return view('user.index', [
            'restaurants' => $restaurants,
            'promotions' => $promotions,
            'highliyRated' => $highliyRated,
            'recommendedRestaurants' => $recommendedRestaurants
        ]);
    }
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
        $searchQuery = $request->input('searchRestaurant');
    
        // Initialize variables for location-based search with default values
        $latitude = null;
        $longitude = null;
        $minLatitude = null;
        $maxLatitude = null;
        $minLongitude = null;
        $maxLongitude = null;
        
        $radius = 2; // Radius in kilometers
        $earthRadius = 6371; // Earth's radius in kilometers
    
        // Initialize a variable to store the displayed address
        $displayedAddress = '';
    
        // Check if a search query is provided and not empty
        if (!empty($searchQuery)) {
            // Check if the search query can be geocoded
            $coordinates = $this->getCoordinatesFromGoogleMaps($searchQuery);
    
            if ($coordinates) {
                // Location-based search
                $latitude = $coordinates['lat'];
                $longitude = $coordinates['lng'];
    
                // Calculate the bounding box coordinates for the 2km radius
                $minLatitude = $latitude - ($radius / $earthRadius) * (180 / pi());
                $maxLatitude = $latitude + ($radius / $earthRadius) * (180 / pi());
    
                $minLongitude = $longitude - ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));
                $maxLongitude = $longitude + ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));
    
                // Set the displayed address to the searched address
                $displayedAddress = $searchQuery;
            }
        }
    
        // Query your database for restaurants based on various criteria
        $restaurants = Restaurant::where(function ($query) use ($searchQuery, $minLatitude, $maxLatitude, $minLongitude, $maxLongitude) {
            if (!empty($searchQuery)) {
                $query->where('title', 'LIKE', '%' . $searchQuery . '%');
            }
    
            if (!is_null($minLatitude) && !is_null($maxLatitude) && !is_null($minLongitude) && !is_null($maxLongitude)) {
                $query->orWhereBetween('lat', [$minLatitude, $maxLatitude])
                    ->orWhereBetween('lng', [$minLongitude, $maxLongitude]);
            }
        })
        ->orWhereHas('tags', function ($query) use ($searchQuery) {
            if (!empty($searchQuery)) {
                $query->where('name', 'LIKE', '%' . $searchQuery . '%');
            }
        })
        ->get();
    
        // Handle the case where no search query is provided or it's empty
        if (empty($searchQuery)) {
            $restaurants = Restaurant::all(); // You can change this to your default behavior
        }
        
    
        return view('user.restaurantspage', [
            'restaurants' => $restaurants,
            'searchAddress' => $displayedAddress, // Use the displayed address here
            'searchQuery' => $searchQuery,
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
