@extends('layouts.dashboard')

@section('title', 'Student Dashboard - Library MS')
@section('header_title', 'Browse Library')
@section('header_subtitle', 'Find your next favorite book.')

@section('content')
    <div
        style="background: white; padding: 2rem; border-radius: 16px; text-align: center; color: var(--text-muted); box-shadow: var(--shadow-sm);">
        <i class="ph-duotone ph-books" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
        <h3>Library Catalog</h3>
        <p>Welcome to your library portal. Use the sidebar to browse books or view your borrowings.</p>
        <a href="{{ route('books.browse') }}" class="btn-primary" style="margin-top: 1.5rem;">Browse Books Now</a>
    </div>
@endsection