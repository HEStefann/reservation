<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Tag;
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
        $promotions = Promotion::where('active', 1)->with('restaurant')->get();

        $highliyRated = Restaurant::where('rating', '>=', 4)->get();
        $recommendedRestaurants = Restaurant::where('recomended', '>', 0)->orderBy('recomended', 'asc')->get();
        return view('user.index', [
            'restaurants' => $restaurants,
            'promotions' => $promotions,
            'highliyRated' => $highliyRated,
            'recommendedRestaurants' => $recommendedRestaurants
        ]);
    }

    public function highlyrated()
    {
        $highliyRated = Restaurant::where('rating', '>=', 4)->get();
        return view('user.highlyrated', [

            'highliyRated' => $highliyRated,
        ]);
    }

    public function recommended()
    {
        $recommendedRestaurants = Restaurant::where('recomended', '>', 0)->orderBy('recomended', 'asc')->get();
        return view('user.recommended', [
            'recommendedRestaurants' => $recommendedRestaurants
        ]);
    }

    public function nearest(Request $request)
    {
        $latitude = $request->query('latitude');
        $longitude = $request->query('longitude');
        $earthRadius = 6371; // Earth's radius in kilometers
        $radius = 2; // Radius in kilometers

        // Calculate the bounding box coordinates for the given radius
        $minLatitude = $latitude - ($radius / $earthRadius) * (180 / pi());
        $maxLatitude = $latitude + ($radius / $earthRadius) * (180 / pi());

        $minLongitude = $longitude - ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));
        $maxLongitude = $longitude + ($radius / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));

        // Find the nearest restaurants within the bounding box coordinates
        $nearestRestaurants = Restaurant::whereBetween('lat', [$minLatitude, $maxLatitude])
            ->whereBetween('lng', [$minLongitude, $maxLongitude])
            ->get();

        return view('user.nearest', compact('nearestRestaurants'));
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
        $user = auth()->user();

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
        $searchLocation = $request->input('searchLocation');
        $tags = Tag::all();

        // Initialize variables for location-based search with default values
        $latitude = null;
        $longitude = null;
        $earthRadius = 6371; // Earth's radius in kilometers

        // Initialize a variable to store the displayed address
        $displayedAddress = '';

        // Query your database for restaurants based on various criteria
        $restaurants = Restaurant::select('*');

        // Add condition for title search
        if (!empty($searchQuery)) {
            $restaurants->where('title', 'LIKE', '%' . $searchQuery . '%');
        }

        // Add condition for location-based search
        if (!empty($searchLocation)) {
            // Check if the search location can be geocoded
            $coordinates = $this->getCoordinatesFromGoogleMaps($searchLocation);

            if ($coordinates) {
                // Location-based search
                $latitude = $coordinates['lat'];
                $longitude = $coordinates['lng'];

                // Set the displayed address to the searched address
                $displayedAddress = $searchLocation;

                // Calculate the bounding box coordinates for the 2 km radius
                $minLatitude = $latitude - (2 / $earthRadius) * (180 / pi());
                $maxLatitude = $latitude + (2 / $earthRadius) * (180 / pi());

                $minLongitude = $longitude - (2 / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));
                $maxLongitude = $longitude + (2 / $earthRadius) * (180 / pi()) / cos($latitude * (pi() / 180));

                $restaurants->whereBetween('lat', [$minLatitude, $maxLatitude])
                    ->whereBetween('lng', [$minLongitude, $maxLongitude]);
            }
        }

        $restaurants = $restaurants->get();

        // Handle the case where no search query is provided or it's empty
        if (empty($searchQuery) && empty($searchLocation)) {
            $restaurants = Restaurant::all(); // You can change this to your default behavior
        }

        // Check if only searchLocation is provided and searchRestaurant is empty
        if (!empty($searchLocation) && empty($searchQuery)) {
            return redirect()->route('search', ['searchLocation' => $searchLocation]);
        }

        return view('user.restaurantspage', [
            'allRestaurantsNumber' => $restaurants->count(),
            'restaurants' => $restaurants,
            'searchAddress' => $displayedAddress, // Use the displayed address here
            'searchQuery' => $searchQuery,
            'tags' => $tags
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


    public function addFavorite(Restaurant $restaurant)
    {
        // get user
        $user = Auth::user();

        // Check if the user has already favorited the restaurant
        if ($user->isFavorite($restaurant)) {
            // Remove the restaurant from the user's favorites
            $user->unfavorite($restaurant);
        } else {
            // Add the restaurant to the user's favorites
            $user->addFavorite($restaurant);
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
