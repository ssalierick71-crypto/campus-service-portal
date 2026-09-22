<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * List the users records.
     */
    public function index(): View
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for adding a user.
     */
    public function create(): View
    {
        return view('admin.users.create');
    }

    /**
     * Show the form for editing a user.
     */
    public function edit(string $user): View
    {
        return view('admin.users.edit', ['user' => $user]);
    }
}
