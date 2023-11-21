<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibrarianController extends Controller
{
    public function index()
    {
        $countBorrowing = Borrow::count();
        $countBorrowed = Borrowing::where('status', '!=', 'confirmed')->count();
        $books = Book::orderBy('id', 'desc')->paginate(5);
        return view('staff.librarians.index', [
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
        return view('staff.librarians.actions.borrowing', [
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

        return view('staff.librarians.actions.borrowed', [
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

    public function books(Request $request)
    {
        $books = Book::orderBy('id', 'desc')->paginate(20);

        $search = $request->input('cariData');

        $books = Book::where('judul', 'like', "%$search%")
        ->orWhere('rak', 'like', "%$search%")
        ->paginate(20);

        return view('staff.librarians.actions.books', [
            'title' => 'Elibin | Managements Books',
            'active' => 'librarians',
            'books' => $books
        ]);
    }

    public function create()
    {
        return view('staff.librarians.actions.create', [
            'title' => 'Elibin | Create Data',
            'active' => 'librarians'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lib_id' => 'required',
            'judul' => 'required|max:40',
            'sinopsis' => 'required',
            'stok' => 'required|numeric',
            'penulis' => 'required',
            'rak' => 'required',
            'gambar' => 'required|file|max:5024|mimes:jpeg,png,jpg,gif'
        ]);
    
        $validatedData = $request->except('gambar');
    
        if ($request->file('gambar')) {
            $path = $request->file('gambar')->store('gambarBuku', 'public');
            $validatedData['gambar'] = '/storage/' . $path;
        }
    
        Book::create($validatedData);
    
        return redirect()->back()->with('successStore', 'Data buku berhasil ditambahkan');
    }    

    public function edit($id)
    {
        $book = Book::find($id);
        return view('staff.librarians.actions.edit', [
            'title' => 'Elibin | Edit',
            'active' => 'librarians',
            'book' => $book
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $rules = [
            'lib_id' => 'required',
            'judul' => 'required|max:40',
            'sinopsis' => 'required',
            'stok' => 'required|numeric',
            'penulis' => 'required',
            'rak' => 'required',
        ];
    
        $validatedData = $request->validate($rules);
    
        $book = Book::find($id);
    
        if ($request->hasFile('gambar')) {
            if ($book->gambar) {
                $oldImagePath = str_replace('/storage/', '', $book->gambar);
                Storage::delete($oldImagePath);
            }
    
            $path = $request->file('gambar')->store('gambarBuku', 'public');
            $validatedData['gambar'] = '/storage/' . $path;
        }
    
    
        $book->update($validatedData);
    
        return redirect()->back()->with('successUpdate', 'Data buku berhasil diupdate!');
    }
    
    public function destroy($id)
    {
        $book = Book::find($id);
    
        if(!$book) {
            return redirect('/staff/librarians/books')->with('errorDestroy', 'Buku tidak ditemukan!');
        }
    
        if($book->gambar) {
            Storage::delete($book->gambar);
        }
    
        Book::destroy($id);
        
        return redirect('/staff/librarians/books')->with('successDestroy', 'Data buku berhasil dihapus!');
    }

}
