@extends('layouts.app', ['role' => 'student'])

@section('title', 'New ticket — Campus Service Portal')

@section('content')
    <!-- Start: Page heading -->
    <div class="max-w-3xl">
        <h1 class="text-xl font-semibold mb-2">Open a ticket</h1>
        <p class="text-sm text-slate-500 mb-6">Tell us what is wrong and where. Add a photo if you can — it helps the technician a lot.</p>
    </div>
    <!-- End: Page heading -->

    <!-- Start: Request form -->
    <form action="{{ route('requests.show', 1) }}" method="get" class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm max-w-3xl">
        <div class="p-6 space-y-5">
            <div>
                <label for="title" class="block text-sm font-medium text-slate-600 mb-2">What's wrong? <span class="text-[#d97706]">*</span></label>
                <input id="title" name="title" required class="input-field" placeholder="e.g. Broken projector in Lecture Hall B2">
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label for="department" class="block text-sm font-medium text-slate-600 mb-2">Department <span class="text-[#d97706]">*</span></label>
                    <select id="department" name="department" required class="input-field">
                        <option value="">Select a department</option>
                        <option value="estates">Estates</option>
                        <option value="ict">ICT Support</option>
                        <option value="halls">Halls</option>
                        <option value="hostel">Hostels</option>
                        <option value="admin">Administration</option>
                    </select>
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-slate-600 mb-2">Category <span class="text-[#d97706]">*</span></label>
                    <select id="category" name="category" required class="input-field">
                        <option value="">Select a category</option>
                        <optgroup label="Estates">
                            <option value="plumbing">Plumbing</option>
                            <option value="electrical">Electrical</option>
                            <option value="hvac">Air conditioning</option>
                            <option value="furniture">Furniture &amp; fittings</option>
                        </optgroup>
                        <optgroup label="ICT Support">
                            <option value="network">Network / Wi-Fi</option>
                            <option value="projector">Projectors &amp; AV</option>
                            <option value="accounts">Accounts &amp; access</option>
                            <option value="hardware">Hardware repair</option>
                        </optgroup>
                        <optgroup label="Halls">
                            <option value="lecture">Lecture hall booking</option>
                            <option value="lab">Lab reservation</option>
                            <option value="event">Event space</option>
                        </optgroup>
                        <optgroup label="Hostels">
                            <option value="room">Room issue</option>
                            <option value="water">Water &amp; sanitation</option>
                            <option value="security">Security concern</option>
                        </optgroup>
                        <optgroup label="Administration">
                            <option value="appointment">Appointment</option>
                            <option value="document">Document request</option>
                            <option value="other">Other</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div>
                <label for="priority" class="block text-sm font-medium text-slate-600 mb-2">Priority</label>
                <select id="priority" name="priority" class="input-field">
                    <option>Low</option>
                    <option selected>Medium</option>
                    <option>High</option>
                </select>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-slate-600 mb-2">Description <span class="text-[#d97706]">*</span></label>
                <textarea id="description" name="description" rows="6" required class="input-field" placeholder="What happened, where, and when did you notice it?"></textarea>
            </div>
            <div>
                <label for="attachment" class="block text-sm font-medium text-slate-600 mb-2">Attachment (optional)</label>
                <input type="file" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.webp" class="w-full text-sm text-slate-500 file-input">
                <p class="text-xs text-slate-500 mt-2">JPG, PNG, WebP or PDF · max 5 MB.</p>
            </div>
        </div>
        <div class="px-4 py-4 bg-white border-t border-slate-200 flex justify-between">
            <a href="{{ route('requests.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100"><i data-lucide="x" class="w-4 h-4 mr-2"></i>Cancel</a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]"><i data-lucide="send" class="w-4 h-4 mr-2"></i>Submit ticket</button>
        </div>
    </form>
    <!-- End: Request form -->
@endsection
