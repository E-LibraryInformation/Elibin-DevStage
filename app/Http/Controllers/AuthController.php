<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registration()
    {
        return view('auth.registration', [
            'title' => 'Elibin | Create Account',
            'logo' => 'https://cdn.discordapp.com/attachments/1037349894622560300/1155489137923731540/elibin-removebg-preview.png'
        ]);
    }

    public function login()
    {
        return view('auth.login', [
            'title' => 'Elibin | Log In',
            'logo' => 'https://cdn.discordapp.com/attachments/1037349894622560300/1155489137923731540/elibin-removebg-preview.png'
        ]);
    }
}
