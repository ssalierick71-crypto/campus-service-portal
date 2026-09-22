@extends('layouts.app', ['role' => 'student'])

@section('title', 'My tickets — Campus Service Portal')

@section('content')
    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">My tickets</h1>
            <p class="text-sm text-slate-500 mt-1">Search by title, department, or a word from the description.</p>
        </div>
        <a href="{{ route('requests.create') }}" class="inline-flex items-center px-4 py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>New ticket</a>
    </div>
    <!-- End: Page heading -->

    <!-- Start: Filters -->
    <form action="{{ route('requests.index') }}" method="get" class="bg-white border border-slate-200 rounded-xl p-4 mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 shadow-sm">
        <div class="lg:col-span-2 relative">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3 top-3.5"></i>
            <input type="search" name="q" placeholder="Search title, department, or a word" class="input-field pl-10">
        </div>
        <select name="status" class="input-field">
            <option>All statuses</option>
            <option>Open</option>
            <option>In progress</option>
            <option>Resolved</option>
            <option>Closed</option>
        </select>
        <select name="department" class="input-field">
            <option>All departments</option>
            <option>Estates</option>
            <option>ICT Support</option>
            <option>Halls</option>
            <option>Hostels</option>
            <option>Administration</option>
        </select>
        <button type="submit" class="px-4 py-2.5 bg-[#2563eb] rounded-xl text-sm font-medium text-white hover:bg-[#1d4ed8]">Apply filters</button>
    </form>
    <!-- End: Filters -->

    <!-- Start: Requests table -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px]">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50">
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">ID</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Title</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Department</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Priority</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Assignee</th>
                        <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-500">CSP-1042</td>
                        <td class="py-3 px-4 text-sm font-medium">Broken projector — Lecture Hall B2</td>
                        <td class="py-3 px-4 text-sm text-slate-500">ICT Support</td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-red-50 text-red-600">High</span></td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-amber-50 text-[#d97706]">In progress</span></td>
                        <td class="py-3 px-4 text-sm text-slate-500">Peter Muwanga</td>
                        <td class="py-3 px-4 text-center"><a href="{{ route('requests.show', 1) }}" class="text-[#2563eb] mr-2"><i data-lucide="eye" class="w-4 h-4 inline"></i></a><a href="{{ route('requests.edit', 1) }}" class="text-[#d97706]"><i data-lucide="edit" class="w-4 h-4 inline"></i></a></td>
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-500">CSP-1038</td>
                        <td class="py-3 px-4 text-sm font-medium">Leaking tap — Hostel Block C</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Estates</td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-amber-50 text-[#d97706]">Medium</span></td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">Open</span></td>
                        <td class="py-3 px-4 text-sm text-slate-500">—</td>
                        <td class="py-3 px-4 text-center"><a href="{{ route('requests.show', 1) }}" class="text-[#2563eb] mr-2"><i data-lucide="eye" class="w-4 h-4 inline"></i></a><a href="{{ route('requests.edit', 1) }}" class="text-[#d97706]"><i data-lucide="edit" class="w-4 h-4 inline"></i></a></td>
                    </tr>
                    <tr class="border-b border-slate-200 hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-500">CSP-1021</td>
                        <td class="py-3 px-4 text-sm font-medium">Lecture hall booking — A1</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Halls</td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">Low</span></td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">Resolved</span></td>
                        <td class="py-3 px-4 text-sm text-slate-500">Sarah Nambi</td>
                        <td class="py-3 px-4 text-center"><a href="{{ route('requests.show', 1) }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="py-3 px-4 text-sm text-slate-500">CSP-1014</td>
                        <td class="py-3 px-4 text-sm font-medium">Appointment with Academic Registrar</td>
                        <td class="py-3 px-4 text-sm text-slate-500">Administration</td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">Low</span></td>
                        <td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-slate-100 text-slate-500">Closed</span></td>
                        <td class="py-3 px-4 text-sm text-slate-500">Admin desk</td>
                        <td class="py-3 px-4 text-center"><a href="{{ route('requests.show', 1) }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-200 flex items-center justify-between text-sm text-slate-500">
            <span>Showing 1–4 of 6</span>
            <div class="flex gap-2">
                <a href="{{ route('requests.index') }}" class="px-3 py-1 rounded-lg border border-slate-200 hover:bg-slate-50">Prev</a>
                <span class="px-3 py-1 rounded-lg bg-[#2563eb] text-white">1</span>
                <a href="{{ route('requests.index') }}" class="px-3 py-1 rounded-lg border border-slate-200 hover:bg-slate-50">Next</a>
            </div>
        </div>
    </div>
    <!-- End: Requests table -->
@endsection
