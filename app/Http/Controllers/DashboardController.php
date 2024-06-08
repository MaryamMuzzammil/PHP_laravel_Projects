<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Event;
use App\Http\Controllers\DashboardController;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalVisitors = User::count();
        // die($totalVisitors);
        // Fetch the total amount of donations
        $totalDonations = Donation::sum('amount');

        // Fetch the count of upcoming events
        // $upcomingEvents = Event::where('date', '>=', now())->count();

        return view('panel.dashboard', compact('totalVisitors', 'totalDonations'));
    }
    }
   


