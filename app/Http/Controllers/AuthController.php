<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Elibin | Log In',
            'logo' => 'https://cdn.discordapp.com/attachments/1037349894622560300/1155489137923731540/elibin-removebg-preview.png'
        ]);
    }

    public function loginApp(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($validate)) {
            // Otentikasi berhasil, ambil data pengguna
            $user = auth()->user();

            // Sekarang Anda dapat mengakses properti pengguna seperti $user->nama dan $user->gambar

            return redirect('/');
        } else {
            return back()->withErrors(['message' => 'Username atau password tidak valid.'])->withInput();
        }
    }

    public function registration()
    {
        return view('auth.registration', [
            'title' => 'Elibin | Create Account',
            'logo' => 'https://cdn.discordapp.com/attachments/1037349894622560300/1155489137923731540/elibin-removebg-preview.png'
        ]);
    }

    public function createAccount(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:100',
            'username' => 'required|unique:users|max:32',
            'password' => 'required',
            'confirm' => 'required|same:password'
        ]);

        if ($validatedData) {
            // Menggunakan data yang divalidasi
            $user = new User;
            $user->fullname = $validatedData['fullname'];
            $user->username = $validatedData['username'];
            $user->password = Hash::make($validatedData['password']);
            $user->gambar = 'storage/users/default.jpg'; // Menambahkan nilai default ke kolom 'gambar'
            $user->save();
            return redirect('/login');
        } else {
            return back()->withErrors(['message' => 'Konfirmasi password tidak sesuai'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
