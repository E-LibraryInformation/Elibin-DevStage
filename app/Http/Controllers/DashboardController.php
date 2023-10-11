<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Follow;
use App\Models\Blacklist;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('rating', 'desc')->take(5)->get();
        $writers = User::where('role', 'penulis')
            ->withCount('followers') // Mengambil jumlah pengikut
            ->orderBy('followers_count', 'desc') // Mengurutkan berdasarkan jumlah pengikut
            ->take(5) // Batasi hasil ke lima penulis teratas
            ->get();


        // Create an empty array to store follower and following counts for each writer
        $followerCounts = [];
        $followingCounts = [];

        foreach ($writers as $writer) {
            // Get the follower count for the current writer
            $followerCount = Follow::where('follows_user_id', $writer->id)->count();

            // Get the following count for the current writer
            $followingCount = Follow::where('user_id', $writer->id)->count();

            // Add the counts to the respective arrays
            $followerCounts[$writer->id] = $followerCount;
            $followingCounts[$writer->id] = $followingCount;
        }

        // Periksa apakah pengguna telah login
        if (Auth::check()) {
            // Jika pengguna telah login, kita akan memproses blacklist
            // Mengambil daftar ID buku yang telah di-blacklist oleh pengguna saat ini
            $blacklistedBookIds = Blacklist::where('user_id', Auth::user()->id)->pluck('book_id');

            // Mengambil daftar buku yang belum di-blacklist oleh pengguna saat ini
            $books = $books->reject(function ($book) use ($blacklistedBookIds) {
                return in_array($book->id, $blacklistedBookIds->all());
            });
        }


        return view('dashboard.index', [
            'title' => 'Elibin | Dashboard',
            'active' => 'dashboard',
            'books' => $books,
            'writers' => $writers,
            'followerCounts' => $followerCounts,
            // Pass the follower counts to the view
            'followingCounts' => $followingCounts,
            // Pass the following counts to the view
        ]);
    }
}