@extends('layouts.public')

@section('title', 'Contact us | Campus Service Portal')
@section('description', 'Reach the campus helpdesk for Estates, ICT, Halls, Hostels, and Registry.')

@section('content')
    <!-- Start: Contact -->
    <section class="relative pt-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-start py-16 lg:py-20">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#d97706] mb-3">Contact us</p>
                    <h1 class="text-3xl sm:text-4xl font-bold mb-5 leading-tight">
                        Need the helpdesk?<br>
                        <span class="text-gradient">We are on campus.</span>
                    </h1>
                    <p class="text-sm sm:text-base text-slate-500 mb-8 leading-relaxed">
                        Use this page for general questions. For a leak, projector, or room booking, open a ticket after you sign in — that reaches the right department faster.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start gap-3 p-4 rounded-xl border border-slate-200">
                            <div class="w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center shrink-0">
                                <i data-lucide="mail" class="w-5 h-5 text-[#2563eb]"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Email</p>
                                <a href="mailto:helpdesk@campus.ac.ug" class="text-sm text-[#2563eb]">helpdesk@campus.ac.ug</a>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl border border-slate-200">
                            <div class="w-11 h-11 rounded-lg bg-amber-50 flex items-center justify-center shrink-0">
                                <i data-lucide="phone" class="w-5 h-5 text-[#d97706]"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Phone</p>
                                <p class="text-sm text-slate-500">Estates: 0414 000 210</p>
                                <p class="text-sm text-slate-500">ICT: 0414 000 211</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded-xl border border-slate-200">
                            <div class="w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center shrink-0">
                                <i data-lucide="clock" class="w-5 h-5 text-[#2563eb]"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Helpdesk hours</p>
                                <p class="text-sm text-slate-500">Monday–Friday, 8:00am – 5:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xl">
                    <p class="text-xs uppercase tracking-wider text-[#d97706] font-semibold">Send a message</p>
                    <h2 class="text-lg font-semibold mt-1 mb-6">We will reply to your campus email</h2>

                    @if (session('success'))
                        <div class="flex items-start gap-3 mb-5 p-4 rounded-xl border border-emerald-200 bg-emerald-50">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                            <p class="text-sm text-emerald-800">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="flex items-start gap-3 mb-5 p-4 rounded-xl border border-red-200 bg-red-50">
                            <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 shrink-0 mt-0.5"></i>
                            <div>
                                <p class="text-sm font-medium text-red-800">Please check the form and send it again.</p>
                                <ul class="mt-2 space-y-1 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-600 mb-2">Full name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required minlength="2" placeholder="Aisha Namuli" class="input-field @error('name') border-red-400 @enderror">
                            @error('name')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Campus email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="aisha.namuli@campus.ac.ug" class="input-field @error('email') border-red-400 @enderror">
                            @error('email')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="department" class="block text-sm font-medium text-slate-600 mb-2">Department</label>
                            <select id="department" name="department" required class="input-field @error('department') border-red-400 @enderror">
                                <option value="">Choose one</option>
                                @foreach ($departments as $value => $label)
                                    <option value="{{ $value }}" @selected(old('department') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-600 mb-2">Message</label>
                            <textarea id="message" name="message" required rows="5" placeholder="How can we help?" class="input-field @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8] glow-blue">
                            Send message
                        </button>
                        <p class="text-xs text-slate-500 text-center">Faults and bookings should go through a ticket, not this form.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Contact -->

    <!-- Start: Offices -->
    <section class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#2563eb] mb-3">Offices</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Where to find us on campus</h2>
                <p class="text-sm text-slate-500">Walk in during helpdesk hours, or send a message and we will point you to the right desk.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center">
                    <div class="w-12 h-12 mx-auto rounded-lg bg-blue-50 flex items-center justify-center mb-3">
                        <i data-lucide="hammer" class="w-6 h-6 text-[#2563eb]"></i>
                    </div>
                    <h3 class="font-semibold mb-1">Estates</h3>
                    <p class="text-xs text-slate-500">Block A, ground floor</p>
                </div>
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center">
                    <div class="w-12 h-12 mx-auto rounded-lg bg-amber-50 flex items-center justify-center mb-3">
                        <i data-lucide="monitor-smartphone" class="w-6 h-6 text-[#d97706]"></i>
                    </div>
                    <h3 class="font-semibold mb-1">ICT Helpdesk</h3>
                    <p class="text-xs text-slate-500">Library, 1st floor</p>
                </div>
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center">
                    <div class="w-12 h-12 mx-auto rounded-lg bg-blue-50 flex items-center justify-center mb-3">
                        <i data-lucide="door-open" class="w-6 h-6 text-[#2563eb]"></i>
                    </div>
                    <h3 class="font-semibold mb-1">Halls office</h3>
                    <p class="text-xs text-slate-500">Academic block</p>
                </div>
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center">
                    <div class="w-12 h-12 mx-auto rounded-lg bg-amber-50 flex items-center justify-center mb-3">
                        <i data-lucide="home" class="w-6 h-6 text-[#d97706]"></i>
                    </div>
                    <h3 class="font-semibold mb-1">Hostels office</h3>
                    <p class="text-xs text-slate-500">Gate 2</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Offices -->
@endsection
