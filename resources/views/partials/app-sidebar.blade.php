@php
    $navGroups = match ($role) {
        'staff' => [
            ['label' => 'Main', 'items' => [
                ['label' => 'Dashboard', 'icon' => 'layout-dashboard', 'url' => route('staff.dashboard'), 'pattern' => 'staff.dashboard'],
                ['label' => 'Department queue', 'icon' => 'inbox', 'url' => route('requests.index'), 'pattern' => 'requests.index'],
                ['label' => 'Assigned to Me', 'icon' => 'user-check', 'url' => route('requests.index') . '#assigned', 'pattern' => null],
                ['label' => 'New ticket', 'icon' => 'plus-circle', 'url' => route('requests.create'), 'pattern' => 'requests.create'],
                ['label' => 'Notifications', 'icon' => 'bell', 'url' => route('notifications'), 'pattern' => 'notifications'],
            ]],
            ['label' => 'Account', 'items' => [
                ['label' => 'My Account', 'icon' => 'user-cog', 'url' => route('profile'), 'pattern' => 'profile'],
            ]],
        ],
        'admin' => [
            ['label' => 'Main', 'items' => [
                ['label' => 'Dashboard', 'icon' => 'layout-dashboard', 'url' => route('admin.dashboard'), 'pattern' => 'admin.dashboard'],
                ['label' => 'All tickets', 'icon' => 'clipboard-list', 'url' => route('requests.index'), 'pattern' => 'requests.*'],
                ['label' => 'Notifications', 'icon' => 'bell', 'url' => route('notifications'), 'pattern' => 'notifications'],
            ]],
            ['label' => 'Administration', 'items' => [
                ['label' => 'Departments', 'icon' => 'building-2', 'url' => route('admin.departments.index'), 'pattern' => 'admin.departments.*'],
                ['label' => 'Categories', 'icon' => 'tags', 'url' => route('admin.categories.index'), 'pattern' => 'admin.categories.*'],
                ['label' => 'People', 'icon' => 'users', 'url' => route('admin.users.index'), 'pattern' => 'admin.users.*'],
                ['label' => 'Messages', 'icon' => 'mail', 'url' => route('admin.messages.index'), 'pattern' => 'admin.messages.*'],
            ]],
            ['label' => 'Account', 'items' => [
                ['label' => 'My Account', 'icon' => 'user-cog', 'url' => route('profile'), 'pattern' => 'profile'],
            ]],
        ],
        default => [
            ['label' => 'Main', 'items' => [
                ['label' => 'Dashboard', 'icon' => 'layout-dashboard', 'url' => route('dashboard'), 'pattern' => 'dashboard'],
                ['label' => 'My tickets', 'icon' => 'clipboard-list', 'url' => route('requests.index'), 'pattern' => 'requests.index'],
                ['label' => 'New ticket', 'icon' => 'plus-circle', 'url' => route('requests.create'), 'pattern' => 'requests.create'],
                ['label' => 'Notifications', 'icon' => 'bell', 'url' => route('notifications'), 'pattern' => 'notifications'],
            ]],
            ['label' => 'Account', 'items' => [
                ['label' => 'My Account', 'icon' => 'user-cog', 'url' => route('profile'), 'pattern' => 'profile'],
            ]],
        ],
    };
@endphp
    <!-- Start: Sidebar -->
    <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 -translate-x-full peer-checked:translate-x-0 sm:translate-x-0 bg-white border-r border-slate-200 flex flex-col">
        <div class="flex-1 px-3 py-4 overflow-y-auto sidebar-scrollbar">
            @foreach ($navGroups as $group)
                <div class="space-y-1 mb-5">
                    <p class="px-3 text-xs font-semibold text-slate-400 uppercase mb-2">{{ $group['label'] }}</p>
                    @foreach ($group['items'] as $item)
                        @php $active = $item['pattern'] && request()->routeIs($item['pattern']); @endphp
                        <a href="{{ $item['url'] }}" class="sidebar-item {{ $active ? 'active border-l-3 border-[#2563eb] bg-blue-50 text-[#2563eb]' : 'border-l-3 border-transparent text-slate-500' }} flex items-center p-2 rounded-lg hover:bg-slate-50 hover:text-slate-900 group text-sm transition-all duration-200 pl-3">
                            <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5 {{ $active ? 'text-[#2563eb]' : 'text-slate-400' }} group-hover:text-[#2563eb] transition-colors"></i>
                            <span class="ms-3 text-sm font-medium">{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
        <!-- Start: Sidebar user card -->
        <div class="mt-auto border-t border-slate-200 p-4">
            <div class="flex items-center space-x-3 mb-3">
                <div class="relative">
                    <div class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center bg-white text-sm font-semibold text-[#2563eb]">{{ $currentUser['initials'] }}</div>
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-900 truncate">{{ $currentUser['name'] }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ $currentUser['email'] }}</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-3 py-2 bg-white rounded-lg border border-slate-200">
                <i data-lucide="{{ $currentUser['role_icon'] }}" class="w-4 h-4 text-[#2563eb]"></i>
                <span class="text-xs font-semibold text-slate-800 uppercase tracking-wide">{{ $currentUser['role_label'] }}</span>
            </div>
        </div>
        <!-- End: Sidebar user card -->
    </aside>
    <!-- End: Sidebar -->
