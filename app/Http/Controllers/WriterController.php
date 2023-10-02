<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WriterController extends Controller
{
    public function index()
    {
        $writers = User::where('role', 'penulis')->paginate(6);
        return view('writers.writers', [
            'title' => 'Elibin | Penulis',
            'active' => 'penulis',
            'writers' => $writers
        ]);
    }

    public function detail($id)
    {
        $writer = User::where('role', 'penulis')->find($id);
        return view('writers.writer', [
            'title' => 'Elibin | Penulis',
            'active' => 'penulis',
            'writer' => $writer
        ]);
    }
}
