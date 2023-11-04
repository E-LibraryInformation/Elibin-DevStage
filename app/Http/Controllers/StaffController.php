<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Borrow;

class StaffController extends Controller
{
    public function index()
    {
        $countAdmin = User::where('role', 'admin')->count();
        $countLibrarians = User::where('role', 'pustakawan')->count();
        $countUser = User::where('role', 'pembaca')->count();
        $countBorrowings = Borrow::count();
        return view('staff.index', [
            'title' => 'Elibin | Staff',
            'active' => NULL,
            'countAdmin' => $countAdmin,
            'countUser' => $countUser,
            'countLibrarians' => $countLibrarians,
            'countBorrowings' => $countBorrowings
        ]);
    }
}
