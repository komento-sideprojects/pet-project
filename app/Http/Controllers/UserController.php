<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function browse()
    {
        $books = Book::where('available', '>', 0)->get();
        return view('user.books.browse', compact('books'));
    }

    public function borrow(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::find($request->book_id);

        if ($book->available > 0) {
            $book->decrement('available');

            BorrowedBook::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'borrow_date' => now()->toDateString(),
                'due_date' => now()->addDays(14)->toDateString(),
                'status' => 'borrowed'
            ]);

            return back()->with('success', 'Book borrowed successfully!');
        }

        return back()->with('error', 'Book is not available.');
    }

    public function borrowed()
    {
        $borrowedBooks = Auth::user()->borrowedBooks()->with('book')->get();
        return view('user.books.borrowed', compact('borrowedBooks'));
    }
}
