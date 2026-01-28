@extends('layouts.dashboard')

@section('title', 'Manage Books - Library MS')
@section('header_title', 'Books')
@section('header_subtitle', 'Manage library inventory.')

@section('content')
    <div style="display: flex; justify-content: flex-end; margin-bottom: 1rem;">
        <button class="btn-primary" onclick="openModal()">
            <i class="ph-bold ph-plus"></i> Add New Book
        </button>
    </div>

    <div style="background: white; border-radius: 16px; box-shadow: var(--shadow-sm); overflow: hidden;">
        <table class="data-table" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background: #f8fafc;">
                <tr>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Title</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Author</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Tag</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Qty</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Status</th>
                    <th style="padding: 1rem; font-weight: 600; color: var(--text-color);">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($books->count() > 0)
                    @foreach($books as $book)
                        <tr style="border-bottom: 1px solid var(--border-color);">
                            <td style="padding: 1rem;">
                                <div style="font-weight: 500;">{{ $book->title }}</div>
                            </td>
                            <td style="padding: 1rem;">{{ $book->author }}</td>
                            <td style="padding: 1rem;">
                                <span style="background: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; color: var(--text-muted);">
                                    {{ $book->category }}
                                </span>
                            </td>
                            <td style="padding: 1rem;">{{ $book->quantity }}</td>
                            <td style="padding: 1rem;">
                                @if($book->available > 0)
                                    <span style="color: #166534; background: #dcfce7; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: 500;">Available</span>
                                @else
                                    <span style="color: #991b1b; background: #fee2e2; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem; font-weight: 500;">Out of Stock</span>
                                @endif
                            </td>
                            <td style="padding: 1rem;">
                                <div style="display: flex; gap: 0.5rem;">
                                    <button class="action-btn" style="width: 32px; height: 32px;" title="Edit">
                                        <i class="ph-bold ph-pencil-simple"></i>
                                    </button>
                                    <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn" style="width: 32px; height: 32px; color: #ef4444; border-color: #fee2e2; background: #fef2f2;" title="Delete">
                                            <i class="ph-bold ph-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" style="padding: 3rem; text-align: center; color: var(--text-muted);">
                            <i class="ph-duotone ph-books" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                            <p>No books found. Add one to get started!</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Add Book Modal (Mocked for now) -->
    <div id="addBookModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <div class="form-header">
                <h3>Add New Book</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Fill in the details below to add a new book to the library.</p>
            </div>
            <!-- Form logic will be added when implementing store method -->
            <p>Book creation form will be implemented soon.</p>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openModal() {
        document.getElementById('addBookModal').classList.add('show');
    }
    function closeModal() {
        document.getElementById('addBookModal').classList.remove('show');
    }
    window.onclick = function(event) {
        if (event.target == document.getElementById('addBookModal')) closeModal();
    }
</script>
@endpush
