@php
    $role = $role ?? 'student';
    $currentUser = config('portal.users.' . $role, config('portal.users.student'));
@endphp
<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen">
    <!-- Start: Sidebar toggle (checkbox, no JavaScript) -->
    <input type="checkbox" id="sidebar-toggle" class="peer hidden">
    <label for="sidebar-toggle" class="fixed inset-0 bg-slate-900/30 z-30 hidden peer-checked:block sm:!hidden"></label>
    <!-- End: Sidebar toggle -->

    @include('partials.app-header')

    @include('partials.app-sidebar')

    <!-- Start: Main content -->
    <div class="pt-16 sm:pl-64 min-h-screen flex flex-col">
        <main class="flex-1 pb-8 px-4 sm:px-8 lg:px-10 pt-6">

            @yield('content')

        </main>
        @include('partials.app-footer')
    </div>
    <!-- End: Main content -->

    <script>lucide.createIcons();</script>
</body>
</html>
