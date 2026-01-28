@extends('layouts.auth')

@section('title', 'Sign Up - Library MS')

@section('content')
    <div class="login-container">
        <header class="login-header">
            <div class="logo-icon">
                <i class="ph-bold ph-user-plus"></i>
            </div>
            <h1>Create Account</h1>
            <p>Join our library community today.</p>
        </header>

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-input" placeholder="John Doe"
                    value="{{ old('fullname') }}" required>
                @error('fullname')
                    <div style="color: #ef4444; margin-top: 0.25rem; font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="library@example.com"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div style="color: #ef4444; margin-top: 0.25rem; font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
                    <button type="button" class="password-toggle" onclick="togglePassword()"
                        aria-label="Toggle password visibility">
                        <i class="ph-bold ph-eye"></i>
                    </button>
                </div>
                @error('password')
                    <div style="color: #ef4444; margin-top: 0.25rem; font-size: 0.8rem;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Sign Up</button>
            <a href="{{ route('login') }}" class="btn-secondary">Already have an account? Log In</a>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('ph-eye', 'ph-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('ph-eye-slash', 'ph-eye');
            }
        }
    </script>
@endpush