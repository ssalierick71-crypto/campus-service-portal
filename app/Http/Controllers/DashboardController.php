<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the requester dashboard.
     */
    public function index(): View
    {
        return view('dashboard');
    }
}
