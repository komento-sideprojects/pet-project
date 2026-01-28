<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'admin@library.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Sample Books
        \App\Models\Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'category' => 'Fiction',
            'quantity' => 5,
            'available' => 5,
        ]);

        \App\Models\Book::create([
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'category' => 'Technology',
            'quantity' => 3,
            'available' => 3,
        ]);
    }
}
