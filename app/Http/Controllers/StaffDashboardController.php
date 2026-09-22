<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StaffDashboardController extends Controller
{
    /**
     * Show the department handler dashboard.
     */
    public function index(): View
    {
        return view('staff.dashboard');
    }
}
