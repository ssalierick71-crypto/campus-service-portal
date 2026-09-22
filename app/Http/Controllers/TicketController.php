<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TicketController extends Controller
{
    /**
     * List the tickets.
     */
    public function index(): View
    {
        return view('requests.index');
    }

    /**
     * Show the form for opening a ticket.
     */
    public function create(): View
    {
        return view('requests.create');
    }

    /**
     * Show a single ticket.
     */
    public function show(string $ticket): View
    {
        return view('requests.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing a ticket.
     */
    public function edit(string $ticket): View
    {
        return view('requests.edit', ['ticket' => $ticket]);
    }
}
