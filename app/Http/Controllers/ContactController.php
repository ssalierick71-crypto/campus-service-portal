<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index(): View
    {
        return view('contact', [
            'departments' => config('portal.departments'),
        ]);
    }

    /**
     * Validate the contact form and store the message in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'department' => ['required', 'string', 'in:' . implode(',', array_keys(config('portal.departments')))],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'department.in' => 'Please choose a department from the list.',
        ]);

        Contact::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you. Your message has been sent to the helpdesk.');
    }
}
