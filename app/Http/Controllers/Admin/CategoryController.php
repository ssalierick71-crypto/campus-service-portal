<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * List the categories records.
     */
    public function index(): View
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for adding a category.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Show the form for editing a category.
     */
    public function edit(string $category): View
    {
        return view('admin.categories.edit', ['category' => $category]);
    }
}
