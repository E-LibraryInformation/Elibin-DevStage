<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklist;
use App\Models\Book;

class BlacklistController extends Controller
{
    public function index($id)
    {
        $bookId = Blacklist::where('user_id', $id)->pluck('book_id');
        $books = Book::whereIn('id', $bookId)->get();

        return view('books.actions.blacklist', [
            'title' => 'Elibin | Blacklist',
            'active' => 'books',
            'books' => $books
        ]);
    }
}
