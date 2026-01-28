<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalBooks = Book::sum('quantity');
        $totalUsers = User::where('role', 'user')->count();
        $totalBorrowed = \App\Models\BorrowedBook::where('status', 'borrowed')->count();

        return view('admin.dashboard', compact('totalBooks', 'totalUsers', 'totalBorrowed'));
    }

    public function manageBooks()
    {
        $books = Book::all();
        return view('admin.books.manage', compact('books'));
    }

    // Add methods for create, update, delete books here
}
