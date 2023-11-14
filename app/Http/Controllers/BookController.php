<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Blacklist;
use App\Models\Bookmark;
use App\Models\Borrow;
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
            $books = Book::get()->paginate(20);
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

        // Mengambil user ID pengguna saat ini
        $userId = Auth::user()->id;

        // Mengambil buku ID dari data yang sedang ditampilkan
        $bookId = $book->id;

        // Memeriksa apakah buku sudah dalam daftar blacklist pengguna saat ini
        $bookIsBlacklisted = Blacklist::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->exists();

        $bookIsBookmarked = Bookmark::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->exists();

        return view('books.book', [
            'title' => 'Elibin | Detail',
            'active' => 'books',
            'book' => $book,
            'bookIsBlacklisted' => $bookIsBlacklisted,
            'bookIsBookmarked' => $bookIsBookmarked
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

        return redirect()->back();
    }

    public function unblacklist($id)
    {
        // Periksa apakah pengguna telah login
        if (Auth::check()) {
            // Menghapus buku dari daftar blacklist pengguna saat ini
            Blacklist::where('user_id', Auth::user()->id)
                ->where('book_id', $id)
                ->delete();

            return redirect()->back()->with('success', 'Buku telah dihapus dari blacklist Anda.');
        }
    }

    public function bookmark(Request $request)
    {
        $blacklist = new Bookmark();
        $blacklist->user_id = $request->input('user_id');
        $blacklist->book_id = $request->input('book_id');
        $blacklist->save();

        return redirect()->back();
    }

    public function unbookmark($id)
    {
        // Periksa apakah pengguna telah login
        if (Auth::check()) {
            // Menghapus buku dari daftar blacklist pengguna saat ini
            Bookmark::where('user_id', Auth::user()->id)
                ->where('book_id', $id)
                ->delete();

            return redirect()->back()->with('success', 'Buku telah dihapus dari bookmark Anda.');
        }
    }

    public function borrow($id)
    {
        $book = Book::find($id);
        return view('books.actions.borrow', [
            'title' => 'Elibin | Borrow',
            'active' => 'Books',
            'book' => $book
        ]);
    }

    public function borrowStore(Request $request, $id)
    {
        // Validasi input sesuai kebutuhan (contoh validasi)
        $request->validate([
            'hari' => 'required|integer|min:1',
        ]);

        $book = Book::find($id);
            
        // Mengambil data dari formulir
        $userId = Auth::user()->id;
        $fullname = Auth::user()->fullname;
        $username = Auth::user()->username;
        $hari = $request->input('hari');
        $bookId = $id; 
        $judul = $book->judul;
    
        // Menyimpan data peminjaman ke dalam tabel "borrow"
        Borrow::create([
            'user_id' => $userId,
            'fullname' => $fullname,
            'username' => $username,
            'hari' => $hari,
            'book_id' => $bookId,
            'judul' => $judul
        ]);
    
        return redirect('/books')->with('successBorrow', 'Buku berhasil dipinjam, liat proses peminjaman buku');
    }
    

}