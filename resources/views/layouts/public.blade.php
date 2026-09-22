<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="bg-white text-slate-900 font-sans antialiased">
    @include('partials.public-header')

    @yield('content')

    @include('partials.public-footer')

    <script>lucide.createIcons();</script>
</body>
</html>
