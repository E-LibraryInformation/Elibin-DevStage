<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function follow(Request $request, $id)
    {
        $writer = User::find($id);
    
        if (!$writer) {
            // Handle jika pengguna yang ingin diikuti tidak ditemukan
            return redirect()->back()->with('error', 'Pengguna yang ingin diikuti tidak ditemukan.');
        }
    
        $user = auth()->user();
    
        // Cek apakah pengguna saat ini mencoba mengikuti akun mereka sendiri atau sudah mengikuti penulis ini
        if ($id === $user->id || $user->following()->wherePivot('follows_user_id', $writer->id)->exists()) {
            if ($id === $user->id) {
                return redirect('/')->back()->with('error', 'Anda tidak dapat mengikuti akun Anda sendiri.');
            } else {
                // Pengguna sudah mengikuti penulis ini, maka hapus dari daftar pengikut
                $user->following()->detach($writer->id);
                return redirect()->back()->with('success', 'Anda berhenti mengikuti penulis ini.');
            }
        } else {
            // Pengguna belum mengikuti penulis ini, maka tambahkan ke daftar pengikut
            $user->following()->attach($writer->id);
            return redirect()->back()->with('success', 'Anda mengikuti penulis ini.');
        }
    }

}
