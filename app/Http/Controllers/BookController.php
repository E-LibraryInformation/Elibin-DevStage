<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.books', [
            'title' => 'Elibin | Books',
            'active' => 'books',
            'books' => $books
        ]);
    }

    public function detail($id)
    {
        $book = Book::find($id);
        return view('books.book', [
            'title' => 'Elibin | Detail',
            'active' => 'books',
            'book' => $book
        ]);
    }

    public function cariBuku(Request $request)
    {
        $keyword = $request->input('cariBuku');

         // Lakukan pencarian berdasarkan ID atau judul
        $books = Book::where('id', $keyword)
        ->orWhere('judul', 'LIKE', "%$keyword%")
        ->get();

        if ($books->isEmpty()) {
            return view('books.actions.search', [
                'title' => 'Elibin | Books',
                'active' => 'books',
                'books' => [],
                'noResults' => 'data buku tidak valid'
            ]);
        }

        return view('books.actions.search', [
            'title' => 'Elibin | Books',
            'active' => 'books',
            'books' => $books,
            'noResults' => null
        ]);
    }
}
