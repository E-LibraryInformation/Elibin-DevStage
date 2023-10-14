<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function index()
    {
        return view('premium.index', [
            'title' => 'Elibin | Upgrade Account',
            'active' => NULL
        ]);
    }
}
