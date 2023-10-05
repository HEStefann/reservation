<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\WorkingHour;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class RestaurantService
{
    public function createRestaurant(array $data): Restaurant
    {
        $restaurant = Restaurant::create($data);
        $restaurant->user_id = auth()->user()->id;
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        foreach ($daysOfWeek as $day) {
            $restaurant->workingHours()->create([
                'day_of_week' => $day,
                'opening_time' => $data['working_hours'][$day]['opening_time'],
                'closing_time' => $data['working_hours'][$day]['closing_time'],
                'default_working_time' => 1,
            ]);
        }
        $restaurant->save();
        return $restaurant;
    }

    // public function updateInfo(Restaurant $restaurant, array $data)
    // {
    //     $restaurant->update($data);
    // }

    // public function updateAvailablePeople(Restaurant $restaurant, array $data)
    // {
    //     $restaurant->update($data);
    // }

    // public function updateOperatingHours(Restaurant $restaurant, array $data)
    // {
    //     foreach ($data['working_hours'] as $day => $dayData) {
    //         $openingTime = isset($dayData['opening_time']) ? WorkingHour::convertTo24HourFormat($dayData['opening_time']) : null;
    //         $closingTime = isset($dayData['closing_time']) ? WorkingHour::convertTo24HourFormat($dayData['closing_time']) : null;

    //         $workingHour = $restaurant->workingHours()->where('day_of_week', $day)->where('default_working_time', true)->first();

    //         if ($workingHour) {
    //             $workingHour->update([
    //                 'opening_time' => $openingTime,
    //                 'closing_time' => $closingTime,
    //             ]);
    //         } else {
    //             WorkingHour::create([
    //                 'restaurant_id' => $restaurant->id,
    //                 'day_of_week' => $day,
    //                 'opening_time' => $openingTime,
    //                 'closing_time' => $closingTime,
    //                 'default_working_time' => true,
    //             ]);
    //         }
    //     }
    // }

    // public function updateOperatingStatus(Restaurant $restaurant, array $data)
    // {
    //     $restaurant->update($data);
    // }

    // public function updateContent(Restaurant $restaurant, array $data)
    // {
    //     $restaurant->update($data);
    // }

    // public function generateCalendar(Restaurant $restaurant, Carbon $date)
    // {
    //     $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
    //     $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

    //     $days = [];
    //     while ($startOfCalendar <= $endOfCalendar) {
    //         $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
    //         $extraClass .= $startOfCalendar->isToday() ? ' today' : '';

    //         $workingHour = $this->getWorkingHoursForDate($restaurant, $startOfCalendar);

    //         if ($workingHour) {
    //             if (!$workingHour->is_working) {
    //                 $extraClass .= ' closed';
    //             } elseif ($workingHour->closing_time < $workingHour->default_closing_time) {
    //                 $extraClass .= ' short-hours';
    //             }
    //         }

    //         $days[] = [
    //             'date' => $startOfCalendar->format('j'),
    //             'class' => $extraClass,
    //         ];
    //         $startOfCalendar->addDay();
    //     }

    //     return [
    //         'month' => $date->format('M'),
    //         'year' => $date->format('Y'),
    //         'days' => $days
    //     ];
    // }


    // public function updateOperatingDay(Restaurant $restaurant, array $data)
    // {
    //     $dayOfWeek = $data['day_of_week'];
    //     $workDate = $data['work_date'];
    //     $availablePeople = $data['available_people'];

    //     $workingHour = $restaurant->working_hours()->where('day_of_week', $dayOfWeek)->first();

    //     if ($workingHour) {
    //         $workingHour->update([
    //             'work_date' => $workDate,
    //             'available_people' => $availablePeople,
    //         ]);
    //     } else {
    //         $restaurant->working_hours()->create([
    //             'day_of_week' => $dayOfWeek,
    //             'work_date' => $workDate,
    //             'available_people' => $availablePeople,
    //         ]);
    //     }
    // }

    // public function getWorkingHoursForDate(Restaurant $restaurant, Carbon $date): ?WorkingHour
    // {
    //     $workingHour = $restaurant->workingHours()
    //         ->where('work_date', $date->format('Y-m-d'))
    //         ->first();

    //     if (!$workingHour) {
    //         $dayOfWeek = $date->format('l');
    //         $workingHour = $restaurant->workingHours()
    //             ->where('day_of_week', $dayOfWeek)
    //             ->where('default_working_time', true)
    //             ->first();
    //     }

    //     return $workingHour;
    // }

    // public function updateOrCreateWorkingHoursForDate(Restaurant $restaurant, Carbon $date, array $data)
    // {
    //     $restaurant->workingHours()->updateOrCreate(['work_date' => $date], $data);
    // }
}
