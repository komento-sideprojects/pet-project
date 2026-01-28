@php
    $user = Auth::user();
    $name = $user->name;
    $email = $user->email;
    $role = $user->role;

    $parts = explode(' ', $name);
    if (count($parts) >= 2) {
        $initials = strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
    } else {
        $initials = strtoupper(substr($name, 0, 2));
    }
@endphp

<aside class="sidebar">
    <div class="logo-section">
        <i class="ph-bold ph-books logo-icon"></i>
        <span class="logo-text">{{ $role === 'admin' ? 'LMS Admin' : 'LMS Student' }}</span>
    </div>

    <ul class="nav-links">
        @if($role === 'admin')
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="ph-duotone ph-squares-four"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.books') }}" class="{{ request()->routeIs('admin.books') ? 'active' : '' }}">
                    <i class="ph-duotone ph-books"></i>
                    <span>Books</span>
                </a>
            </li>
            <!-- Add other admin links here -->
        @else
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="ph-duotone ph-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('books.browse') }}" class="{{ request()->routeIs('books.browse') ? 'active' : '' }}">
                    <i class="ph-duotone ph-books"></i>
                    <span>Browse Books</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('books.borrowed') }}" class="{{ request()->routeIs('books.borrowed') ? 'active' : '' }}">
                    <i class="ph-duotone ph-book-open"></i>
                    <span>My Borrowed Books</span>
                </a>
            </li>
            <!-- Add other user links here -->
        @endif

        <li class="nav-item" style="margin-top: auto;">
            <a href="#" class="">
                <i class="ph-duotone ph-gear"></i>
                <span>Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" id="sidebar-logout-form" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();"
                style="color: #ef4444;">
                <i class="ph-duotone ph-sign-out"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

    <div class="user-profile">
        <div class="avatar" {!! $role !== 'admin' ? 'style="background: linear-gradient(135deg, #10b981, #3b82f6);"' : '' !!}>
            {{ $initials }}
        </div>
        <div class="user-info">
            <h4>{{ $name }}</h4>
            <p>{{ $email }}</p>
        </div>
    </div>
</aside>