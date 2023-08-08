<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWorkingHoursRequest;
use App\Services\RestaurantService;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;


class RestaurantSettingsCalendarController extends Controller
{
    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }
    public function index(Restaurant $restaurant)
    {
        $date = Carbon::now();
        $calendar = $this->restaurantService->generateCalendar($restaurant, $date);

        return view('restaurant.settings.calendar', compact('restaurant', 'calendar'));
    }

    public function updateOperatingDay(Request $request, Restaurant $restaurant)
    {
        $this->restaurantService->updateOperatingDay($restaurant, $request->all());

        return redirect()->back()->with('success', 'Operating day updated successfully.');
    }

    public function calendar(Restaurant $restaurant, $date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::now();
        $calendar = $this->restaurantService->generateCalendar($restaurant, $date);

        return compact('restaurant', 'calendar');
    }

    public function updateWorkingHours(UpdateWorkingHoursRequest $request, $restaurantId)
    {
        $validatedData = $request->validated();

        $restaurant = Restaurant::findOrFail($restaurantId);
        $date = Carbon::parse($request->input('selected_date'));
        $data = [
            'is_working' => $validatedData['is_working'],
            'opening_time' => $validatedData['opening_time'],
            'closing_time' => $validatedData['closing_time'],
            'available_people' => $validatedData['available_people'],
            'work_date' => $date
        ];

        $this->restaurantService->updateOrCreateWorkingHoursForDate($restaurant, $date, $data);

        return redirect()->back()->with('success', 'Working hours updated successfully');
    }

    public function getWorkingHoursForDate(Restaurant $restaurant, $date)
    {
        $date = Carbon::parse($date);
        $workingHour = app(RestaurantService::class)->getWorkingHoursForDate($restaurant, $date);

        return response()->json($workingHour);
    }
}
