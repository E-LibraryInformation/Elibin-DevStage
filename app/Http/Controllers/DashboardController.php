<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('rating', 'desc')->take(5)->get();
        return view('dashboard.index', [
            'title' => 'Elibin | Dashboard',
            'active' => 'dashboard',
            'books' => $books
        ]);
    }
}
