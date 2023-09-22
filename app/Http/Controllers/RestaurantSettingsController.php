<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest; // Import the RestaurantRequest class

use App\Http\Requests\RestaurantSettingsRequest;
use App\Models\Moderator;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Table;
use App\Models\Tag;
use App\Services\RestaurantService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



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

    public function updateTablePosition(Request $request)
    {
        $user = Auth::user();
        $requestTables = $request->json()->all();
        
        foreach ($requestTables as $requestTable) {
            Log::debug($requestTable['TableDescription']);
            if ($requestTable['id'] == 'new') {
                $table = new Table();
                $table->PositionLeft = $requestTable['left'];
                $table->PositionTop = $requestTable['top'];
                $table->IdFloor = $requestTable['IdFloor'];
                $table->Shape = $requestTable['Shape'];
                $table->Active = $requestTable['Active'];
                $table->Reserved = $requestTable['Reserved'];
                $table->Lock = $requestTable['Lock'];
                $table->Capacity = $requestTable['Capacity'];
                $table->TableDescription = $requestTable['TableDescription'];
                $table->TableShortDescription = '/';
                $table->Height = $requestTable['Height'];
                $table->Width = $requestTable['Width'];
                $table->CreatedBy = $user->id;

                $table->save();
                continue;
            } else {
                $table = Table::find($requestTable['id']); // Find the table by its ID  
                if ($table) {
                    // Update the table's position properties
                    $table->PositionLeft = $requestTable['left'];
                    $table->PositionTop = $requestTable['top'];
                    $table->save(); // Save the changes to the database
                }
            }
            
        }
        return response('Position saved');
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
