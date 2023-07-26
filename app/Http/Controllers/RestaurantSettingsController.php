<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Restaurant $restaurant)
    {
        return view('restaurants.settings', compact('restaurant'));
    }

    public function updateInfo(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $restaurant->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back()->with('success', 'Restaurant information updated successfully.');
    }

    public function updateAvailablePeople(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'available_people' => 'required|integer|min:1',
        ]);

        $restaurant->update([
            'available_people' => $request->input('available_people'),
        ]);

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id])
            ->with('success', 'Available number of people updated successfully.');
    }
    private function convertTo24HourFormat($time)
    {
        return date('H:i', strtotime($time));
    }

    public function updateOperatingHours(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'working_hours' => 'required|array',
        ]);

        $workingHoursData = $request->input('working_hours');

        $validator = Validator::make($workingHoursData, [
            'Monday' => 'array',
            'Tuesday' => 'array',
            'Wednesday' => 'array',
            'Thursday' => 'array',
            'Friday' => 'array',
            'Saturday' => 'array',
            'Sunday' => 'array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($days as $day) {
            if (!isset($workingHoursData[$day])) {
                continue;
            }

            $dayData = $workingHoursData[$day];
            $openingTime = isset($dayData['opening_time']) ? $this->convertTo24HourFormat($dayData['opening_time']) : null;
            $closingTime = isset($dayData['closing_time']) ? $this->convertTo24HourFormat($dayData['closing_time']) : null;

            $workingHour = $restaurant->workingHours()->where('day_of_week', $day)->first();

            if ($workingHour) {
                $workingHour->update([
                    'opening_time' => $openingTime,
                    'closing_time' => $closingTime,
                ]);
            } else {
                // Create new working hours for the day
                WorkingHour::create([
                    'restaurant_id' => $restaurant->id,
                    'day_of_week' => $day,
                    'opening_time' => $openingTime,
                    'closing_time' => $closingTime,
                    'default_working_time' => true,
                ]);
            }
        }

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id])
            ->with('success', 'Operating hours updated successfully.');
    }
    public function updateOperatingStatus(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'operating_status' => 'required|in:open,close',
        ]);

        $restaurant->update([
            'operating_status' => $request->input('operating_status'),
        ]);

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id])
            ->with('success', 'Operating status updated successfully.');
    }

    public function updateContent(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'content_title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
        ]);

        $restaurant->update([
            'content_title' => $request->input('content_title'),
            'short_description' => $request->input('short_description'),
        ]);

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id])
            ->with('success', 'Content updated successfully.');
    }
}