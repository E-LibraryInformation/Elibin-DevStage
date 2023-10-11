<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function librarians()
    {
        $librarians = User::paginate(20);
        return view('perpustakaan.actions.librarians', [
            'title' => 'Elibin | Pustakawan',
            'active' => 'perpustakaan',
            'librarians' => $librarians
        ]);
    }

    public function information()
    {
        return view('perpustakaan.actions.information', [
            'title' => 'Elibin | Informasi',
            'active' => 'perpustakaan'
        ]);
    }
}
