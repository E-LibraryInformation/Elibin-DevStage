<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function followers($id)
    {
        $user = User::find($id)->get();
        return view('follow.follower', [
            'title' => 'Elibin | Follower',
            'active' => 'penulis',
            'user' => $user
        ]);
    }
}
