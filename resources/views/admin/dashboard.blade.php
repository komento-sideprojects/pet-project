@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Library MS')
@section('header_title', 'Dashboard')
@section('header_subtitle', 'Welcome back, Admin!')

@section('content')
    <div class="stats-grid">
        <div class="stat-card">
            <i class="ph-duotone ph-books"></i>
            <div class="stat-info">
                <h3>{{ $totalBooks }}</h3>
                <p>Total Books</p>
            </div>
        </div>
        <div class="stat-card">
            <i class="ph-duotone ph-users"></i>
            <div class="stat-info">
                <h3>{{ $totalUsers }}</h3>
                <p>Total Students</p>
            </div>
        </div>
        <div class="stat-card">
            <i class="ph-duotone ph-arrow-fat-lines-up"></i>
            <div class="stat-info">
                <h3>{{ $totalBorrowed }}</h3>
                <p>Books Issued</p>
            </div>
        </div>
    </div>

    <div
        style="background: white; padding: 2rem; border-radius: 16px; margin-top: 2rem; text-align: center; color: var(--text-muted);">
        <h3>Recent Activity</h3>
        <p>System activity will appear here.</p>
    </div>
@endsection

@push('styles')
    <style>
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            box-shadow: var(--shadow-sm);
        }

        .stat-card i {
            font-size: 2.5rem;
            color: var(--primary-color);
        }

        .stat-info h3 {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .stat-info p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }
    </style>
@endpush