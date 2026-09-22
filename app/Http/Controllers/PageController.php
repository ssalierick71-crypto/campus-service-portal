<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show the sign in screen.
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Show the create account screen.
     */
    public function register(): View
    {
        return view('auth.register');
    }

    /**
     * Show the forgot password screen.
     */
    public function forgotPassword(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Show the reset password screen.
     */
    public function resetPassword(): View
    {
        return view('auth.reset-password');
    }

    /**
     * Show the notifications screen.
     */
    public function notifications(): View
    {
        return view('notifications');
    }

    /**
     * Show the account screen.
     */
    public function profile(): View
    {
        return view('profile');
    }
}
