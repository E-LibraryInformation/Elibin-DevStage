<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index()
    {
        $countBorrow = Borrow::count();
        $books = Book::paginate(5);
        return view('admin.librarians.index', [
            'title' => 'Elibin | Librarians',
            'active' => NULL,
            'countBorrow' => $countBorrow,
            'books' => $books
        ]);
    }
}
