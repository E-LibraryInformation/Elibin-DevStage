<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Book;

class BookmarkController extends Controller
{
    public function index($id)
    {
        $bookId = Bookmark::where('user_id', $id)->pluck('book_id');
        $books = Book::whereIn('id', $bookId)->get();

        return view('books.actions.bookmark', [
            'title' => 'Elibin | Bookmark',
            'active' => 'books',
            'books' => $books
        ]);
    }
}
