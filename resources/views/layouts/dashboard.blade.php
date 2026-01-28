<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Library MS')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    @stack('styles')
</head>

<body>
    @include('layouts.partials.sidebar')

    <main class="main-content">
        <header class="top-bar">
            <div class="page-title">
                <h2>@yield('header_title')</h2>
                <p>@yield('header_subtitle')</p>
            </div>
            <div class="top-actions">
                <button class="action-btn" title="Notifications">
                    <i class="ph-bold ph-bell"></i>
                </button>
                <button class="action-btn" title="Search">
                    <i class="ph-bold ph-magnifying-glass"></i>
                </button>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="action-btn" title="Logout">
                        <i class="ph-bold ph-sign-out"></i>
                    </button>
                </form>
            </div>
        </header>

        <div class="content-container">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>

</html>