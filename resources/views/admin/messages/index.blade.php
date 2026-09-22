@extends('layouts.app', ['role' => 'admin'])

@section('title', 'Messages — Campus Service Portal')

@section('content')
    <!-- Start: Page heading -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-xl font-semibold">Helpdesk messages</h1>
            <p class="text-sm text-slate-500 mt-1">Everything sent through the contact page, newest first.</p>
        </div>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-slate-900 hover:bg-slate-50"><i data-lucide="external-link" class="w-4 h-4 mr-2"></i>Open contact page</a>
    </div>
    <!-- End: Page heading -->

    <!-- Start: Messages table -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px]">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50">
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Sender</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Department</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Message</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Received</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr class="border-b border-slate-200 last:border-0 hover:bg-slate-50 align-top">
                            <td class="py-3 px-4 text-sm">
                                <p class="font-medium text-slate-900">{{ $message->name }}</p>
                                <p class="text-slate-500 text-xs mt-1">{{ $message->email }}</p>
                            </td>
                            <td class="py-3 px-4">
                                <span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">{{ $departments[$message->department] ?? $message->department }}</span>
                            </td>
                            <td class="py-3 px-4 text-sm text-slate-600 max-w-md">{{ $message->message }}</td>
                            <td class="py-3 px-4 text-sm text-slate-500 whitespace-nowrap">{{ $message->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 px-4 text-center">
                                <i data-lucide="inbox" class="w-8 h-8 text-slate-300 inline-block"></i>
                                <p class="text-sm text-slate-500 mt-3">No messages yet. Send one from the contact page and it will appear here.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- End: Messages table -->

    @if ($messages->hasPages())
        <div class="mt-6">
            {{ $messages->links() }}
        </div>
    @endif
@endsection
