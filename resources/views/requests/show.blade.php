@extends('layouts.app', ['role' => 'student'])

@section('title', 'Ticket — Campus Service Portal')

@section('content')
    <!-- Start: Page heading -->
    <a href="{{ route('requests.index') }}" class="inline-flex items-center text-sm text-slate-500 hover:text-slate-900"><i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>Back to tickets</a>
    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mt-3 mb-6">
        <div>
            <p class="text-xs text-slate-500 mb-1">CSP-1042 · ICT Support · Projectors &amp; AV</p>
            <h1 class="text-xl font-semibold">Broken projector — Lecture Hall B2</h1>
            <div class="flex flex-wrap gap-2 mt-3">
                <span class="text-xs px-2 py-1 rounded-full bg-amber-50 text-[#d97706]">In progress</span>
                <span class="text-xs px-2 py-1 rounded-full bg-red-50 text-red-600">High priority</span>
                <span class="text-xs px-2 py-1 rounded-full bg-slate-100 text-slate-600">Assigned to Peter Muwanga</span>
            </div>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('requests.edit', 1) }}" class="inline-flex items-center px-4 py-2 bg-[#2563eb] text-white rounded-lg text-sm font-medium hover:bg-[#1d4ed8]"><i data-lucide="edit" class="w-4 h-4 mr-2"></i>Edit</a>
            <a href="#delete-confirm" class="inline-flex items-center px-4 py-2 bg-white border border-red-200 text-red-600 rounded-lg text-sm font-medium hover:bg-red-50"><i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>Delete</a>
        </div>
    </div>
    <!-- End: Page heading -->

    <!-- Start: Ticket progress -->
    <div class="bg-white border border-slate-200 rounded-xl p-5 mb-6 shadow-sm">
        <p class="text-xs font-semibold uppercase tracking-wider text-slate-500 mb-4">Ticket progress</p>
        <div class="grid grid-cols-4 gap-2 text-center text-xs">
            <div><div class="mx-auto w-7 h-7 rounded-full bg-[#2563eb] text-white flex items-center justify-center mb-2">1</div><p class="text-slate-500">Open</p></div>
            <div><div class="mx-auto w-7 h-7 rounded-full bg-[#d97706] text-white flex items-center justify-center mb-2 font-semibold">2</div><p class="text-[#d97706] font-medium">In progress</p></div>
            <div><div class="mx-auto w-7 h-7 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center mb-2">3</div><p class="text-slate-500">Resolved</p></div>
            <div><div class="mx-auto w-7 h-7 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center mb-2">4</div><p class="text-slate-500">Closed</p></div>
        </div>
        <p class="text-xs text-slate-500 mt-4">If the job is still not done, they can reopen the ticket to <span class="text-[#d97706]">in progress</span>.</p>
    </div>
    <!-- End: Ticket progress -->

    <div class="grid lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <!-- Start: Description -->
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500 mb-3">Description</h2>
                <p class="text-sm leading-relaxed">The projector in Lecture Hall B2 powers on but shows a blank blue screen. Happened during the 10am lecture on 11 Sep. HDMI from the podium laptop does not detect a display. Students could not follow the slides.</p>
            </div>
            <!-- End: Description -->

            <!-- Start: Attachments -->
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-sm font-semibold text-slate-500">Attachments</h2>
                    <span class="text-xs text-[#2563eb]">+ Upload</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="image" class="w-5 h-5 text-[#2563eb]"></i></div>
                        <div><p class="text-sm">hall-b2-projector.jpg</p><p class="text-xs text-slate-500">1.8 MB · uploaded by Aisha</p></div>
                    </div>
                    <a href="#" class="text-sm text-[#2563eb]">Download</a>
                </div>
            </div>
            <!-- End: Attachments -->

            <!-- Start: Comments -->
            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500 mb-4">Comments</h2>
                <div class="space-y-4 mb-5">
                    <div class="flex gap-3">
                        <div class="w-9 h-9 rounded-full bg-amber-50 text-[#d97706] flex items-center justify-center text-xs font-semibold shrink-0">PM</div>
                        <div class="flex-1 rounded-xl bg-slate-50 border border-slate-200 p-3">
                            <div class="flex justify-between text-xs text-slate-500 mb-1"><span class="text-slate-900 font-medium">Peter Muwanga</span><span>1 hr ago</span></div>
                            <p class="text-sm">Technician is scheduled for Monday 8am before the first lecture. Please leave the HDMI cable on the podium.</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-9 h-9 rounded-full bg-blue-50 text-[#2563eb] flex items-center justify-center text-xs font-semibold shrink-0">AN</div>
                        <div class="flex-1 rounded-xl bg-slate-50 border border-slate-200 p-3">
                            <div class="flex justify-between text-xs text-slate-500 mb-1"><span class="text-slate-900 font-medium">Aisha Namuli</span><span>50 min ago</span></div>
                            <p class="text-sm">Thank you — I will inform the lecturer.</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('requests.show', 1) }}" method="get" class="flex gap-3">
                    <input class="input-field" name="comment" placeholder="Write a note on this ticket…">
                    <button class="px-4 py-2 bg-[#2563eb] rounded-xl text-sm font-medium text-white hover:bg-[#1d4ed8] shrink-0"><i data-lucide="send" class="w-4 h-4"></i></button>
                </form>
            </div>
            <!-- End: Comments -->

            <!-- Start: Delete confirm -->
            <div id="delete-confirm" class="bg-red-50 border border-red-200 rounded-xl p-6">
                <h3 class="font-semibold text-red-700 mb-2">Delete this ticket?</h3>
                <p class="text-sm text-red-600/80 mb-4">This cannot be undone. The comments and history on this ticket will be gone.</p>
                <div class="flex gap-3">
                    <a href="{{ route('requests.index') }}" class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600">Yes, delete</a>
                    <a href="{{ route('requests.show', 1) }}" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50">Cancel</a>
                </div>
            </div>
            <!-- End: Delete confirm -->
        </div>

        <div class="space-y-6">
            <!-- Start: People and staff actions -->
            <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500 mb-4">People</h2>
                <p class="text-xs text-slate-500">Submitted by</p>
                <p class="text-sm mb-3">Aisha Namuli · Student</p>
                <p class="text-xs text-slate-500">Assigned to</p>
                <p class="text-sm mb-4">Peter Muwanga · ICT Support</p>
                <form action="{{ route('requests.show', 1) }}" method="get" class="space-y-3">
                    <label class="block text-xs text-slate-500">Staff actions</label>
                    <select name="assignee" class="input-field">
                        <option>Assign to self</option>
                        <option selected>Peter Muwanga</option>
                        <option>Sarah Nambi</option>
                    </select>
                    <select name="status" class="input-field">
                        <option>Open</option>
                        <option selected>In progress</option>
                        <option>Resolved</option>
                        <option>Closed</option>
                    </select>
                    <textarea name="resolution" class="input-field" rows="3" placeholder="What did you do? (needed when you mark it resolved)"></textarea>
                    <button class="w-full py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]">Update status</button>
                </form>
            </div>
            <!-- End: People and staff actions -->

            <!-- Start: Status history -->
            <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                <h2 class="text-sm font-semibold text-slate-500 mb-4">Status history</h2>
                <ol class="space-y-4 text-sm">
                    <li class="flex gap-3">
                        <div class="w-2 h-2 mt-1.5 rounded-full bg-[#d97706] shrink-0"></div>
                        <div><p>Open → <span class="text-[#d97706]">In progress</span></p><p class="text-xs text-slate-500">Peter Muwanga · 11 Sep, 14:22</p></div>
                    </li>
                    <li class="flex gap-3">
                        <div class="w-2 h-2 mt-1.5 rounded-full bg-[#2563eb] shrink-0"></div>
                        <div><p>Created as <span class="text-[#2563eb]">Open</span></p><p class="text-xs text-slate-500">Aisha Namuli · 11 Sep, 10:41</p></div>
                    </li>
                </ol>
            </div>
            <!-- End: Status history -->
        </div>
    </div>
@endsection
