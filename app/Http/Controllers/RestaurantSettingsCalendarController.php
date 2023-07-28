<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class RestaurantSettingsCalendarController extends Controller
{
    public function calendar($date = null)
    {
        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

        $days = [];
        while ($startOfCalendar <= $endOfCalendar) {
            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';

            $days[] = [
                'date' => $startOfCalendar->format('j'),
                'class' => $extraClass
            ];
            $startOfCalendar->addDay();
        }

        return [
            'month' => $date->format('M'),
            'year' => $date->format('Y'),
            'days' => $days
        ];
    }
}
