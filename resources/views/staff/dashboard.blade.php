@extends('layouts.app', ['role' => 'staff'])

@section('title', 'Staff dashboard — Campus Service Portal')

@section('content')
    <!-- Start: Page heading -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Good afternoon, Daniel</h1>
        <p class="text-slate-500 mt-1">Estates has 18 open jobs. Three have had no update since Thursday.</p>
    </div>
    <!-- End: Page heading -->

    <!-- Start: Stats cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="inbox" class="w-5 h-5 text-[#2563eb]"></i></div><div><p class="text-2xl font-bold">18</p><p class="text-sm text-slate-500">Open in Estates</p></div></div></div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="user-check" class="w-5 h-5 text-[#d97706]"></i></div><div><p class="text-2xl font-bold">5</p><p class="text-sm text-slate-500">On my list</p></div></div></div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center"><i data-lucide="alert-triangle" class="w-5 h-5 text-red-500"></i></div><div><p class="text-2xl font-bold">3</p><p class="text-sm text-slate-500">Quiet since Thursday</p></div></div></div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center"><i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600"></i></div><div><p class="text-2xl font-bold">11</p><p class="text-sm text-slate-500">Finished this week</p></div></div></div>
    </div>
    <!-- End: Stats cards -->

    <!-- Start: Queue panels -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Waiting for someone</h2>
                <a href="{{ route('requests.index') }}" class="text-sm text-[#2563eb]">View queue</a>
            </div>
            <a href="{{ route('requests.show', 1) }}" class="block border-b border-slate-200 py-3 hover:bg-slate-50 -mx-2 px-2 rounded">
                <div class="flex justify-between"><p class="text-sm font-medium">Leaking tap — Hostel Block C</p><span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">Open</span></div>
                <p class="text-xs text-slate-500 mt-1">High · submitted 19 hours ago</p>
            </a>
            <a href="{{ route('requests.show', 1) }}" class="block py-3 hover:bg-slate-50 -mx-2 px-2 rounded">
                <div class="flex justify-between"><p class="text-sm font-medium">Flickering lights — Library west wing</p><span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">Open</span></div>
                <p class="text-xs text-slate-500 mt-1">Medium · submitted 2 days ago</p>
            </a>
        </div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">On my list</h2>
                <a href="{{ route('requests.index') }}#assigned" class="text-sm text-[#d97706]">View all</a>
            </div>
            <a href="{{ route('requests.show', 1) }}" class="block border-b border-slate-200 py-3 hover:bg-slate-50 -mx-2 px-2 rounded">
                <div class="flex justify-between"><p class="text-sm font-medium">AC not cooling — Senate boardroom</p><span class="text-xs px-2 py-1 rounded-full bg-amber-50 text-[#d97706]">In progress</span></div>
                <p class="text-xs text-slate-500 mt-1">High · last comment 40 min ago</p>
            </a>
            <a href="{{ route('requests.show', 1) }}" class="block py-3 hover:bg-slate-50 -mx-2 px-2 rounded">
                <div class="flex justify-between"><p class="text-sm font-medium">Broken door handle — Block D</p><span class="text-xs px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">Resolved</span></div>
                <p class="text-xs text-slate-500 mt-1">Waiting for the student to confirm it is fixed</p>
            </a>
        </div>
    </div>
    <!-- End: Queue panels -->
@endsection
