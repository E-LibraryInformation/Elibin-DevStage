<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function followers($id)
    {
        $followerIds = DB::table('user_follows')
            ->where('follows_user_id', $id)
            ->pluck('user_id');

        $users = Db::table('users')
            ->whereIn('id', $followerIds)
            ->get();

        $profile = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('follow.follower', [
            'title' => 'Elibin | Follower',
            'active' => 'penulis',
            'users' => $users,
            'id' => $id,
            'profile' => $profile
            // 'followers' => $followers,
        ]);
    }

    public function following($id)
    {
        $followingIds = DB::table('user_follows')
            ->where('user_id', $id)
            ->pluck('follows_user_id');

        $users = Db::table('users')
            ->whereIn('id', $followingIds)
            ->get();

        $profile = DB::table('users')
            ->where('id', $id)
            ->first();

        return view('follow.following', [
            'title' => 'Elibin | Following',
            'active' => 'penulis',
            'users' => $users,
            'id' => $id,
            'profile' => $profile
        ]);
    }

}