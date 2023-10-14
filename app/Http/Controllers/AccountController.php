<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blacklist;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $followersCount = $user->followers()->count();
        $followingCount = $user->following()->count();

        $countBlacklist = Blacklist::where('user_id', Auth::user()->id)->count();
        $countBookmark = Bookmark::where('user_id', Auth::user()->id)->count();
    
        return view('profile.index', [
            'title' => 'Elibin | Profile',
            'active' => NULL,
            'user' => $user,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
            'countBlacklist' => $countBlacklist,
            'countBookmark' => $countBookmark
        ]);
    }

    public function editProfile(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users,username,' . auth()->user()->id, // Untuk menghindari validasi unik pada diri sendiri
            'bio' => 'nullable',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh validasi untuk gambar profil
        ]);

        // Simpan perubahan ke dalam database
        $user = auth()->user();
        $user->fullname = $validatedData['fullname'];
        $user->username = $validatedData['username'];
        $user->bio = $validatedData['bio'];

        // Periksa apakah ada gambar profil yang diunggah
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('users', 'public');
            $user->gambar = 'storage/' . $imagePath;
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui.');
    }


}
