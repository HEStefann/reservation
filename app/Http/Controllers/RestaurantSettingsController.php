<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantSettingsRequest;
use App\Models\Restaurant;
use App\Models\Tag;
use App\Services\RestaurantService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RestaurantSettingsController extends Controller
{
    protected $restaurantService;

    public function dashboard()
    {
        $reservedCount = Reservation::count();
        $availableCount = DB::table('restaurants')->sum('available_people');

        return view('dashboard', compact('reservedCount', 'availableCount'));
    }

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    public function index(Restaurant $restaurant)
    {
        $allTags = Tag::all();

        return view('restaurant.settings', [
            'restaurant' => $restaurant,
            'allTags' => $allTags
        ]);
    }

    public function updateInfo(RestaurantSettingsRequest $request, Restaurant $restaurant)
    {
        $this->restaurantService->updateInfo($restaurant, $request->validated());

        return redirect()->back()->with('success', 'Restaurant information updated successfully.');
    }

    public function updateAvailablePeople(RestaurantSettingsRequest $request, Restaurant $restaurant)
    {
        $this->restaurantService->updateAvailablePeople($restaurant, $request->validated());

        return redirect()->back()->with('success', 'Available number of people updated successfully.');
    }

    public function updateOperatingHours(Request $request, $restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);

        foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day) {
            $openingTime = $request->input("working_hours.$day.opening_time");
            $closingTime = $request->input("working_hours.$day.closing_time");

            $data = [
                'opening_time' => $openingTime,
                'closing_time' => $closingTime,
            ];

            $workingHour = $restaurant->workingHours()->where('day_of_week', $day)->first();

            if ($workingHour) {
                $workingHour->update($data);
            } else {
                $restaurant->workingHours()->create($data);
            }
        }

        return redirect()->back()->with('success', 'Operating hours updated successfully.');
    }

    public function updateOperatingStatus(RestaurantSettingsRequest $request, Restaurant $restaurant)
    {
        $this->restaurantService->updateOperatingStatus($restaurant, $request->validated());

        return redirect()->back()->with('success', 'Operating status updated successfully.');
    }

    public function updateContent(RestaurantSettingsRequest $request, Restaurant $restaurant)
    {
        $this->restaurantService->updateContent($restaurant, $request->validated());

        return redirect()->back()->with('success', 'Content updated successfully.');
    }
}
