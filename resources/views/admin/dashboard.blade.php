@extends('layouts.app', ['role' => 'admin'])

@section('title', 'Admin dashboard — Campus Service Portal')

@section('content')
    <!-- Start: Page heading -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Good afternoon, Joy</h1>
        <p class="text-slate-500 mt-1">Seven tickets across campus have gone quiet for more than two days.</p>
    </div>
    <!-- End: Page heading -->

    <!-- Start: Stats cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><p class="text-2xl font-bold">142</p><p class="text-sm text-slate-500 mt-1">Tickets this month</p></div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><p class="text-2xl font-bold">9.4h</p><p class="text-sm text-slate-500 mt-1">Typical wait for a first reply</p></div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><p class="text-2xl font-bold text-[#d97706]">7</p><p class="text-sm text-slate-500 mt-1">No update for 2+ days</p></div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><p class="text-2xl font-bold">86%</p><p class="text-sm text-slate-500 mt-1">Finished within 5 days</p></div>
    </div>
    <!-- End: Stats cards -->

    <!-- Start: Attention and admin shortcuts -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Needs a nudge</h2>
                <a href="{{ route('requests.index') }}" class="text-sm text-[#2563eb]">All tickets</a>
            </div>
            <div class="space-y-3">
                <a href="{{ route('requests.show', 1) }}" class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 hover:border-amber-200">
                    <div><p class="text-sm font-medium">Wi-Fi down — Faculty of Computing</p><p class="text-xs text-slate-500 mt-1">ICT · High · 51 hours with no update</p></div>
                    <span class="text-xs px-2 py-1 rounded-full bg-red-50 text-red-600">Stale</span>
                </a>
                <a href="{{ route('requests.show', 1) }}" class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-200">
                    <div><p class="text-sm font-medium">Broken projector — Lecture Hall B2</p><p class="text-xs text-slate-500 mt-1">ICT · In progress · assigned to Peter Muwanga</p></div>
                    <span class="text-xs px-2 py-1 rounded-full bg-amber-50 text-[#d97706]">In progress</span>
                </a>
                <a href="{{ route('requests.show', 1) }}" class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-200">
                    <div><p class="text-sm font-medium">Leaking tap — Hostel Block C</p><p class="text-xs text-slate-500 mt-1">Estates · Unassigned</p></div>
                    <span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">Open</span>
                </a>
            </div>
        </div>
        <div class="space-y-4">
            <a href="{{ route('admin.departments.index') }}" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-blue-200">
                <div class="flex items-center gap-3 mb-2"><i data-lucide="building-2" class="w-5 h-5 text-[#2563eb]"></i><h3 class="font-semibold">Departments</h3></div>
                <p class="text-sm text-slate-500">5 departments</p>
            </a>
            <a href="{{ route('admin.categories.index') }}" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-amber-200">
                <div class="flex items-center gap-3 mb-2"><i data-lucide="tags" class="w-5 h-5 text-[#d97706]"></i><h3 class="font-semibold">Categories</h3></div>
                <p class="text-sm text-slate-500">16 categories</p>
            </a>
            <a href="{{ route('admin.users.index') }}" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-blue-200">
                <div class="flex items-center gap-3 mb-2"><i data-lucide="users" class="w-5 h-5 text-[#2563eb]"></i><h3 class="font-semibold">People</h3></div>
                <p class="text-sm text-slate-500">248 students, 31 staff, 4 admins</p>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-amber-200">
                <div class="flex items-center gap-3 mb-2"><i data-lucide="mail" class="w-5 h-5 text-[#d97706]"></i><h3 class="font-semibold">Messages</h3></div>
                <p class="text-sm text-slate-500">{{ $messageCount }} {{ Str::plural('message', $messageCount) }} from the contact page</p>
            </a>
        </div>
    </div>
    <!-- End: Attention and admin shortcuts -->
@endsection
