<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">
    @yield('content')

    @include('partials.auth-footer')

    <script>lucide.createIcons();</script>
</body>
</html>
