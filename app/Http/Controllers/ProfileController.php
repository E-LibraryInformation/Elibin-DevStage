<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Follow;

class ProfileController extends Controller
{
    public function index($id)
    {
        $account = User::find($id);
        $user = auth()->user();

    
        // Check if the user is following the account
        $isFollowing = Follow::where('user_id', $user->id)
            ->where('follows_user_id', $account->id)
            ->exists();
    
        $followerCount = Follow::where('follows_user_id', $id)->count();
        $followingCount = Follow::where('user_id', $id)->count();
    
        return view('profile.public', [
            'title' => 'Elibin | Penulis',
            'active' => NULL,
            'account' => $account,
            'follower' => $followerCount,
            'following' => $followingCount,
            'isFollowing' => $isFollowing, 
        ]);
    }    
}
