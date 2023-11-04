<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use App\Models\Book;
use App\Models\Library;

class LibraryController extends Controller
{
    public function index()
    {
        $jumlahPustakawan = User::where('role', 'pustakawan')->count();
        return view('perpustakaan.index', [
            'title' => 'Elibin | Perpustakaan',
            'active' => 'perpustakaan',
            'jumlahPustakawan' => $jumlahPustakawan
        ]);
    }

    public function librarians(Request $request)
    {
        $librarians = User::where('role', 'pustakawan')->paginate(20);

        $search = $request->input('cariPustakawan');

        $librarians = User::where('role', 'pustakawan')
            ->where('fullname', 'like', "%$search%")
            ->paginate(10);

        $followerCounts = [];
        $followingCounts = [];

        // Create an empty array to store follower and following counts for each writer
        $followerCounts = [];
        $followingCounts = [];

        foreach ($librarians as $librarian) {
            // Get the follower count for the current writer
            $followerCount = Follow::where('follows_user_id', $librarian->id)->count();

            // Get the following count for the current writer
            $followingCount = Follow::where('user_id', $librarian->id)->count();

            // Add the counts to the respective arrays
            $followerCounts[$librarian->id] = $followerCount;
            $followingCounts[$librarian->id] = $followingCount;
        }

        return view('perpustakaan.actions.librarians', [
            'title' => 'Elibin | Pustakawan',
            'active' => 'perpustakaan',
            'librarians' => $librarians,
            'followerCounts' => $followerCounts,
            // Pass the follower counts to the view
            'followingCounts' => $followingCounts,
            // Pass the following counts to the view
        ]);
    }

    public function information()
    {
        return view('perpustakaan.actions.information', [
            'title' => 'Elibin | Informasi',
            'active' => 'perpustakaan'
        ]);
    }

    public function log()
    {
        $books = Book::orderBy('id', 'desc')->get();
        return view('perpustakaan.actions.log', [
            'title' => 'Elibin | Blacklist',
            'active' => 'perpustakaan',
            'books' => $books
        ]);
    }

    public function library() 
    {
        $library = Library::first();
        $countBooks = Book::count();
        return view('perpustakaan.actions.library', [
            'title' => 'Elibin | Library',
            'active' => 'perpustakaan',
            'library' => $library,
            'countBooks' => $countBooks
        ]);
    }
}