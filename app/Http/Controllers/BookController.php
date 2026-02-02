<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $categorySlug = $request->query('category');

        // Fetching books with search, category filtering, and cover_image support
        $books = Book::with('category')
            ->when($search, function ($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                      ->orWhere('author', 'LIKE', "%{$search}%")
                      ->orWhere('genre', 'LIKE', "%{$search}%");
                });
            })
            ->when($categorySlug, function ($query, $categorySlug) {
                return $query->whereHas('category', function($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            })
            ->latest()
            ->paginate(12);

        $categories = Category::withCount('books')->get();

        return view('books.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        // Ensuring the single book view has access to the category and all database fields
        $book->load('category');
        
        // Fetch related books in the same category (optional but recommended for UX)
        $relatedBooks = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->limit(4)
            ->get();

        return view('books.show', compact('book', 'relatedBooks'));
    }
}