<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Library;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $countUser = User::where('role', 'pembaca')->count();
        $countAdmin = User::where('role', 'admin')->count();
        $countLibrarians = User::where('role', 'pustakawan')->count();
        $countWriters = User::where('role', 'penulis')->count();
        return view('staff.admin.index', [
            'title' => 'Elibin | Admin',
            'active' => 'admin',
            'countUser' => $countUser,
            'countAdmin' => $countAdmin,
            'countLibrarians' => $countLibrarians,
            'countWriters' => $countWriters
        ]);
    }

    public function library()
    {
        $library = Library::first();
        return view('staff.admin.actions.library', [
            'title' => 'Elibin | Library',
            'active' => 'admin',
            'library' => $library
        ]);
    }

    public function users()
    {
        $users = User::where('role', 'pembaca')->paginate(20);
        return view('staff.admin.actions.users', [
            'title' => 'Elibin | Users List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

    public function admin()
    {
        $users = User::where('role', 'admin')->paginate(20);
        return view('staff.admin.actions.admin', [
            'title' => 'Elibin | Admin List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

    public function librarians()
    {
        $users = User::where('role', 'pustakawan')->paginate(20);
        return view('staff.admin.actions.librarians', [
            'title' => 'Elibin | Librarians List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

    public function writers()
    {
        $users = User::where('role', 'penulis')->paginate(20);
        return view('staff.admin.actions.writers', [
            'title' => 'Elibin | Writers List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

}
