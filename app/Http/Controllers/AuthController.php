<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registration() 
    {
        return view('auth.register', [
            "title" => "Registration"
        ]);
    }
}
