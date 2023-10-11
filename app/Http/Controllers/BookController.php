<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Blacklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        // Periksa apakah pengguna telah login
        if (Auth::check()) {
            // Jika pengguna telah login, maka kita akan memproses blacklist
            // Mengambil daftar ID buku yang telah di-blacklist oleh pengguna saat ini
            $blacklistedBookIds = Blacklist::where('user_id', Auth::user()->id)->pluck('book_id');
        
            // Mengambil daftar buku yang belum di-blacklist oleh pengguna saat ini
            $books = Book::whereNotIn('id', $blacklistedBookIds)->paginate(20);
        } else {
            // Jika pengguna belum login, tampilkan semua buku
            $books = Book::paginate(20);
        }
    
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

    public function blacklist(Request $request)
    {

        $blacklist = new Blacklist();
        $blacklist->user_id = $request->input('user_id');
        $blacklist->book_id = $request->input('book_id');
        $blacklist->save();
        
        return redirect('/books');
    }    

}