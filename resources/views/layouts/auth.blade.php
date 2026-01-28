<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @stack('styles')
</head>

<body>
    <!-- Decorative Background Shapes -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>

    @yield('content')

    @stack('scripts')
</body>

</html>