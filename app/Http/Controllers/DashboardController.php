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
}
