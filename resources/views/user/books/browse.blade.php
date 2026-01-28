@extends('layouts.dashboard')

@section('title', 'Browse Books - Library MS')
@section('header_title', 'Browse Books')
@section('header_subtitle', 'Discover available books in the library.')

@section('content')
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ session('error') }}
        </div>
    @endif

    @if($books->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
            @foreach($books as $book)
                <div
                    style="background: white; border-radius: 16px; padding: 1.5rem; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; height: 100%;">
                    <div style="flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                            <span
                                style="background: #f1f5f9; color: var(--text-muted); font-size: 0.75rem; padding: 4px 8px; border-radius: 4px; font-weight: 500;">
                                {{ $book->category }}
                            </span>
                            @if($book->available > 0)
                                <span style="color: #166534; font-size: 0.75rem; font-weight: 600;">Available</span>
                            @else
                                <span style="color: #991b1b; font-size: 0.75rem; font-weight: 600;">Out of Stock</span>
                            @endif
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--text-color); margin-bottom: 0.25rem;">
                            {{ $book->title }}
                        </h3>
                        <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1.5rem;">
                            by {{ $book->author }}
                        </p>
                    </div>
                    <div style="margin-top: auto;">
                        <form method="POST" action="{{ route('books.borrow') }}" style="margin: 0;">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;" {{ $book->available == 0 ? 'disabled style="background: #cbd5e1; cursor: not-allowed;"' : '' }}>
                                {{ $book->available > 0 ? 'Borrow Book' : 'Unavailable' }}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div
            style="background: white; padding: 3rem; border-radius: 16px; box-shadow: var(--shadow-sm); text-align: center; color: var(--text-muted);">
            <i class="ph-duotone ph-books" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
            <h3>Library is Empty</h3>
            <p>No books have been added yet.</p>
        </div>
    @endif
@endsection