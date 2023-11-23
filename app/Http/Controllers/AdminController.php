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

    public function users(Request $request)
    {
        $users = User::where('role', 'pembaca')->paginate(20);

        $search = $request->input('searchUser');

        $users = User::where('role', 'pembaca')
            ->where(function ($query) use ($search) {
                $query->where('fullname', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%");
            })
            ->paginate(20);

        return view('staff.admin.actions.users', [
            'title' => 'Elibin | Users List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

    public function admin(Request $request)
    {
        $users = User::where('role', 'admin')->paginate(20);

        $search = $request->input('searchUser');

        $users = User::where('role', 'admin')
            ->where(function ($query) use ($search) {
                $query->where('fullname', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%");
            })
            ->paginate(20);

        return view('staff.admin.actions.admin', [
            'title' => 'Elibin | Admin List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

    public function librarians(Request $request)
    {
        $users = User::where('role', 'pustakawan')->paginate(20);

        $search = $request->input('searchUser');

        $users = User::where('role', 'pustakawan')
            ->where(function ($query) use ($search) {
                $query->where('fullname', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%");
            })
            ->paginate(20);

        return view('staff.admin.actions.librarians', [
            'title' => 'Elibin | Librarians List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

    public function writers(Request $request)
    {
        $users = User::where('role', 'penulis')->paginate(20);

        $search = $request->input('searchUser');

        $users = User::where('role', 'penulis')
            ->where(function ($query) use ($search) {
                $query->where('fullname', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%");
            })
            ->paginate(20);

        return view('staff.admin.actions.writers', [
            'title' => 'Elibin | Writers List',
            'active' => 'admin',
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'library' => 'required|max:15',
            'alamat' => 'required',
            'gmaps' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Library::where('id', $id)->update($validatedData);

        return redirect('/staff/admin/library')->with('success', 'Informasi Perpustakaan berhasil diperbarui!');
    }

    public function roleUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('successRole', 'Peran pengguna berhasil diperbarui!');
    }
}
