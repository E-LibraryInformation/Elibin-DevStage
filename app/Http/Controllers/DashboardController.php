<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('rating', 'desc')->take(5)->get();
        $writers = User::where('role', 'penulis')->paginate(5);
        return view('dashboard.index', [
            'title' => 'Elibin | Dashboard',
            'active' => 'dashboard',
            'books' => $books,
            'writers' => $writers
        ]);
    }
}
