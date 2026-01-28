@extends('layouts.auth')

@section('title', 'Login - Library MS')

@section('content')
    <div class="login-container">
        <header class="login-header">
            <div class="logo-icon">
                <i class="ph-bold ph-books"></i>
            </div>
            <h1>Welcome Back</h1>
            <p>Enter your credentials to access the library portal.</p>
        </header>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
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
            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>

            <button type="submit" class="btn-primary">Sign In</button>
            <a href="{{ route('register') }}" class="btn-secondary">Sign Up</a>
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