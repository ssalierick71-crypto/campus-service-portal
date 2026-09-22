<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * List the departments records.
     */
    public function index(): View
    {
        return view('admin.departments.index');
    }

    /**
     * Show the form for adding a department.
     */
    public function create(): View
    {
        return view('admin.departments.create');
    }

    /**
     * Show the form for editing a department.
     */
    public function edit(string $department): View
    {
        return view('admin.departments.edit', ['department' => $department]);
    }
}
