<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest; // Import the RestaurantRequest class

use App\Http\Requests\RestaurantSettingsRequest;
use App\Models\Moderator;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\RestaurantImage;
use App\Models\Table;
use App\Models\Tag;
use App\Services\RestaurantService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RestaurantSettingsController extends Controller
{
    protected $restaurantService;

    public function index(Restaurant $restaurant)
    {

        $user = Auth::user();
        // restaurant with working hours
        $restaurant = Moderator::where('user_id', $user->id)
            ->withoutGlobalScope('approved_active')
            ->first()
            ->restaurant;
        $restaurantImage = $restaurant->images;
        return view('restaurant.settings', [
            'restaurant' => $restaurant,
            'restaurantImage' => $restaurantImage
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        // Update restaurant details
        $restaurant->update($request->except(['working_hours', 'first_image'])); // Exclude 'working_hours' and 'first_image' from restaurant update

        // Loop through working hours data
        foreach ($request->working_hours as $dayOfWeek => $hours) {
            // Find or create a WorkingHour record for the current day
            $workingHour = $restaurant->workingHours()->firstOrNew([
                'day_of_week' => $dayOfWeek,
            ]);

            // Update the working hours data
            $workingHour->fill($hours);
            $workingHour->save();
        }

        // Handle image upload
        if ($request->hasFile('first_image')) {
            $image = $request->file('first_image');
            $restaurantImgName = $restaurant->id . '-' . time();
            $imageName = $restaurantImgName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images', $imageName);

            // Find the existing profile picture and set its display_order to 0
            $existingProfilePicture = RestaurantImage::where('restaurant_id', $restaurant->id)
                ->where('display_order', 1)
                ->first();

            if ($existingProfilePicture) {
                $existingProfilePicture->display_order = 0;
                $existingProfilePicture->save();
            }

            // Create a new RestaurantImage record for the profile picture
            $restaurantImage = new RestaurantImage([
                'image_url' => $imageName,
                'restaurant_id' => $restaurant->id,
                'display_order' => 1,
            ]);
            $restaurantImage->save();
        }

        if ($request->hasFile('other_image')) {
            $image = $request->file('other_image');
            $restaurantImgName = $restaurant->id . '-' . time(); // Use timestamp for uniqueness
            $imageName = $restaurantImgName . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images', $imageName);

            // Find the maximum display_order for other images
            $maxDisplayOrder = RestaurantImage::where('restaurant_id', $restaurant->id)
                ->where('display_order', '!=', 1) // Exclude profile picture
                ->max('display_order');

            // Assign a unique display_order
            $displayOrder = $maxDisplayOrder + 1;

            // Check for existing images with the same display_order and increment
            while (RestaurantImage::where('restaurant_id', $restaurant->id)
                ->where('display_order', $displayOrder)
                ->exists()
            ) {
                $displayOrder++;
            }

            // Create a new RestaurantImage record for other images
            $restaurantImage = new RestaurantImage([
                'image_url' => $imageName,
                'restaurant_id' => $restaurant->id,
                'display_order' => $displayOrder,
            ]);
            $restaurantImage->save();
        }

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

    public function removeRestaurantImage($imageId)
    {
        // Find the restaurant image by ID
        $restaurantImage = RestaurantImage::find($imageId);

        if ($restaurantImage) {
            // Delete the image from the storage
            Storage::delete($restaurantImage->image_url);

            // Delete the restaurant image from the database
            $restaurantImage->delete();

            // Return a success response
            return response()->json(['message' => 'Restaurant image removed successfully.']);
        }

        // Return an error response if the restaurant image is not found
        return response()->json(['error' => 'Restaurant image not found.'], 404);
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
                    $table->Height = $requestTable['Height'];
                    $table->Width = $requestTable['Width'];
                    $table->save(); // Save the changes to the database
                }
            }
        }
        return response('Position saved');
    }

    public function editDate($selectedDate)
    {
        $selectedDate = Carbon::parse($selectedDate)->format('Y-m-d');
        $user = Auth::user();
        $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant->with(['workingHours' => function ($query) use ($selectedDate) {
            $query->whereDate('work_date', $selectedDate);
        }])->first();
        if ($restaurant->workingHours->count() > 0) {
            return response()->json($restaurant->workingHours);
        } else {
            $dayOfWeek = Carbon::parse($selectedDate)->dayOfWeek;
            $restaurant = Moderator::where('user_id', $user->id)->first()->restaurant->with(['workingHours' => function ($query) use ($dayOfWeek) {
                $query->where('day_of_week', $dayOfWeek);
                $query->where('default_working_time', 1);
            }])->first();
            $restaurant->workingHours->map(function ($item) use ($selectedDate) {
                $item->work_date = $selectedDate;
                return $item;
            });

            return response()->json($restaurant->workingHours);
        }
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
