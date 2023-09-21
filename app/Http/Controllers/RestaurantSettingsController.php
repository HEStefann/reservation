<?php

namespace App\Http\Controllers;
use App\Http\Requests\RestaurantRequest; // Import the RestaurantRequest class

use App\Http\Requests\RestaurantSettingsRequest;
use App\Models\Moderator;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Tag;
use App\Services\RestaurantService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RestaurantSettingsController extends Controller
{
    protected $restaurantService;

    public function index(Restaurant $restaurant)
    {
        $user = Auth::user();
        // restaurant with working hours
        $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant;
        return view('restaurant.settings', [
            'restaurant' => $restaurant,
        ]);
    }
    
    public function update(Request $request)
    {   
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        
        $workingHours = $restaurant->workingHours;
        $restaurant->update($request->all());
        // find the working hours for the current restaurant use the WorkingHour model
        return redirect()->back()->with('success', 'Restaurant updated successfully!');
    }

    public function floorPlan(Restaurant $restaurant)
    {
        $user = Auth::user();
        $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant;
        return view('restaurant.floor-plan', [
            'restaurant' => $restaurant,
        ]);
    }

    // public function dashboard()
    // {
    //     $reservedCount = Reservation::count();
    //     $availableCount = DB::table('restaurants')->sum('available_people');

    //     return view('dashboard', compact('reservedCount', 'availableCount'));
    // }

    // public function __construct(RestaurantService $restaurantService)
    // {
    //     $this->restaurantService = $restaurantService;
    // }

    // public function updateInfo(RestaurantSettingsRequest $request, Restaurant $restaurant)
    // {
    //     $this->restaurantService->updateInfo($restaurant, $request->validated());

    //     return redirect()->back()->with('success', 'Restaurant information updated successfully.');
    // }

    // public function updateAvailablePeople(RestaurantSettingsRequest $request, Restaurant $restaurant)
    // {
    //     $this->restaurantService->updateAvailablePeople($restaurant, $request->validated());

    //     return redirect()->back()->with('success', 'Available number of people updated successfully.');
    // }

    // public function updateOperatingHours(Request $request, $restaurantId)
    // {
    //     $restaurant = Restaurant::findOrFail($restaurantId);

    //     foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day) {
    //         $openingTime = $request->input("working_hours.$day.opening_time");
    //         $closingTime = $request->input("working_hours.$day.closing_time");

    //         $data = [
    //             'opening_time' => $openingTime,
    //             'closing_time' => $closingTime,
    //         ];

    //         $workingHour = $restaurant->workingHours()->where('day_of_week', $day)->first();

    //         if ($workingHour) {
    //             $workingHour->update($data);
    //         } else {
    //             $restaurant->workingHours()->create($data);
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Operating hours updated successfully.');
    // }

    // public function updateOperatingStatus(RestaurantSettingsRequest $request, Restaurant $restaurant)
    // {
    //     $this->restaurantService->updateOperatingStatus($restaurant, $request->validated());

    //     return redirect()->back()->with('success', 'Operating status updated successfully.');
    // }

    // public function updateContent(RestaurantSettingsRequest $request, Restaurant $restaurant)
    // {
    //     $this->restaurantService->updateContent($restaurant, $request->validated());

    //     return redirect()->back()->with('success', 'Content updated successfully.');
    // }
}
