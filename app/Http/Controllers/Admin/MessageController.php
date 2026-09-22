<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * List the messages sent through the contact page.
     */
    public function index(): View
    {
        return view('admin.messages.index', [
            'messages' => Contact::latest()->paginate(10),
            'departments' => config('portal.departments'),
        ]);
    }
}
