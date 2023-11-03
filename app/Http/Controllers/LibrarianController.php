<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index()
    {
        $countBorrowing = Borrow::count();
        $countBorrowed = Borrowing::where('status', '!=', 'confirmed')->count();
        $books = Book::orderBy('id', 'desc')->paginate(5);
        return view('admin.librarians.index', [
            'title' => 'Elibin | Librarians',
            'active' => 'librarians',
            'countBorrowing' => $countBorrowing,
            'countBorrowed' => $countBorrowed,
            'books' => $books
        ]);
    }

    public function borrowing()
    {
        $datas = Borrow::paginate(20);
        return view('admin.librarians.actions.borrowing', [
            'title' => 'Elibin | Borrowing',
            'active' => 'librarians',
            'datas' => $datas
        ]);
    }

    public function confirmBorrow($id) {
        $data = Borrow::find($id);

        // Menyimpan data yang akan dipindahkan ke tabel Borrowing
        $borrowing = new Borrowing;
        $borrowing->user_id = $data->user_id;
        $borrowing->book_id = $data->book_id;
        $borrowing->hari = $data->hari;
        $borrowing->save();

        // Menghapus data dari tabel Borrow berdasarkan ID
        $data->delete();

        return redirect()->back()->with('success', 'Data confirmed and moved to borrowing.');
    }

    public function borrowed()
    {
        $borrowings = Borrowing::with(['user', 'book'])
            ->where('status', '!=', 'confirmed')
            ->get();

        return view('admin.librarians.actions.borrowed', [
            'title' => 'Elibin | Borrowed',
            'active' => 'librarians',
            'borrowings' => $borrowings
        ]);
    }


    public function confirmEnd($id)
    {
        $borrowing = Borrowing::find($id);

        if ($borrowing) {
            $borrowing->update(['status' => 'confirmed']);
        }

        return redirect()->back();
    }

    public function books()
    {
        $books = Book::orderBy('id', 'desc')->get();
        return view('admin.librarians.actions.books', [
            'title' => 'Elibin | Managements Books',
            'active' => 'librarians',
            'books' => $books
        ]);
    }

    public function create()
    {
        return view('admin.librarians.actions.create', [
            'title' => 'Elibin | Create Data',
            'active' => 'librarians'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:40',
            'sinopsis' => 'required'
        ]);
    }

}
