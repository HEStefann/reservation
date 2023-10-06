<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\WorkingHour;
use Illuminate\Http\Request;

class RestaurantWorkingHoursController extends Controller
{
    public function updateWorkingHours(Request $request)
    {

        $restaurant = Restaurant::where('user_id', auth()->user()->id)->first();
        $workinghours = WorkingHour::where('restaurant_id', $restaurant->id)->where('work_date', $request->work_date)->first();

        if (!$workinghours) {
            $workinghours = new WorkingHour;
            $workinghours->restaurant_id = $restaurant->id;
            $workinghours->work_date = $request->work_date;
            $workinghours->is_working = $request->is_working;
            $workinghours->available_people = $request->available_people;
            $workinghours->opening_time = $request->opening_time;
            $workinghours->closing_time = $request->closing_time;
            $workinghours->save();
            return redirect()->back();
        } else {
            $workinghours->is_working = $request->is_working;
            $workinghours->available_people = $request->available_people;
            $workinghours->opening_time = $request->opening_time;
            $workinghours->closing_time = $request->closing_time;
            $workinghours->save();
            return redirect()->back();
        }
    }
}
