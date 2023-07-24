<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply authentication middleware to the controller
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

        $restaurant->updateRestaurantInfo($request->only(['title', 'description']));

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id])
            ->with('success', 'Restaurant information updated successfully.');
    }

    public function updateAvailablePeople(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'available_people' => 'required|integer',
        ]);

        $restaurant->updateAvailablePeople($request->input('available_people'));

        return redirect()->route('restaurant.settings.index', ['restaurant' => $restaurant->id])
            ->with('success', 'Available number of people updated successfully.');
    }

    public function updateOperatingHours(Request $request, Restaurant $restaurant)
    {
        // Move the logic for updating working hours here if necessary.

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id])
            ->with('success', 'Operating hours updated successfully.');
    }

    public function updateOperatingStatus(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'operating_status' => 'required|in:open,close',
        ]);

        $restaurant->updateOperatingStatus($request->input('operating_status'));

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id])
            ->with('success', 'Operating status updated successfully.');
    }

    public function updateContent(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'content_title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
        ]);

        $restaurant->updateContent($request->only(['content_title', 'short_description']));

        return redirect()->route('restaurant.settings', ['restaurant' => $restaurant->id])
            ->with('success', 'Content updated successfully.');
    }
}