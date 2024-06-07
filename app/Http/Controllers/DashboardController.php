<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('panel.dashboard');
    }
    public function showCalendar()
    {
        $year = date('Y');
        $month = date('m');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $calendar = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
            $calendar[] = [
                'date' => $date,
                'day' => date('l', strtotime($date)), // Day name (e.g., Monday)
                'events' => [] // You can add events data here if needed
            ];
        }

        return view('dashboard', compact('calendar', 'year', 'month'));
    }

}
