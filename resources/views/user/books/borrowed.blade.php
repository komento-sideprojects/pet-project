@extends('layouts.dashboard')

@section('title', 'My Borrowed Books - Library MS')
@section('header_title', 'My Borrowed Books')
@section('header_subtitle', 'View and manage your borrowed books.')

@section('content')
    @if($borrowedBooks->count() > 0)
        <div style="background: white; border-radius: 16px; box-shadow: var(--shadow-sm); overflow: hidden;">
            <table class="data-table" style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead style="background: #f8fafc;">
                    <tr>
                        <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Book</th>
                        <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Author</th>
                        <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Category</th>
                        <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Borrowed Date</th>
                        <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Due Date</th>
                        <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowedBooks as $borrowed)
                        @php
                            $dueDate = \Carbon\Carbon::parse($borrowed->due_date);
                            $isOverdue = now()->gt($dueDate) && $borrowed->status === 'borrowed';
                            $daysDifference = now()->diffInDays($dueDate, false);
                        @endphp
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 1rem;">
                                <div style="font-weight: 500;">{{ $borrowed->book->title }}</div>
                            </td>
                            <td style="padding: 1rem;">{{ $borrowed->book->author }}</td>
                            <td style="padding: 1rem;">
                                <span style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; color: var(--text-muted);">
                                    {{ $borrowed->book->category }}
                                </span>
                            </td>
                            <td style="padding: 1rem; color: var(--text-muted);">{{ \Carbon\Carbon::parse($borrowed->borrow_date)->format('M d, Y') }}</td>
                            <td style="padding: 1rem; color: var(--text-muted);">{{ $dueDate->format('M d, Y') }}</td>
                            <td style="padding: 1rem;">
                                @if($borrowed->status === 'returned')
                                    <span style="color: #64748b; background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: 500;">Returned</span>
                                @elseif($isOverdue)
                                    <span style="color: #991b1b; background: #fee2e2; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: 500;">Overdue</span>
                                @elseif($daysDifference >= 0 && $daysDifference <= 3)
                                    <span style="color: #ea580c; background: #ffedd5; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: 500;">Due in {{ floor($daysDifference) }} day{{ floor($daysDifference) != 1 ? 's' : '' }}</span>
                                @else
                                    <span style="color: #166534; background: #dcfce7; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: 500;">Active</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="background: white; padding: 3rem; border-radius: 16px; box-shadow: var(--shadow-sm); text-align: center; color: var(--text-muted);">
            <i class="ph-duotone ph-book-open" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
            <h3>No Borrowed Books</h3>
            <p>You haven't borrowed any books yet. Browse the library to get started!</p>
            <a href="{{ route('books.browse') }}" class="btn-primary" style="margin-top: 1rem; text-decoration: none;">Browse Books</a>
        </div>
    @endif
@endsection
