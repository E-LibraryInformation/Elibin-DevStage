<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;

class WriterController extends Controller
{
    public function index()
    {
        $writers = User::where('role', 'penulis')->paginate(10);
    
        // Create an empty array to store follower and following counts for each writer
        $followerCounts = [];
        $followingCounts = [];
    
        foreach ($writers as $writer) {
            // Get the follower count for the current writer
            $followerCount = Follow::where('follows_user_id', $writer->id)->count();
    
            // Get the following count for the current writer
            $followingCount = Follow::where('user_id', $writer->id)->count();
    
            // Add the counts to the respective arrays
            $followerCounts[$writer->id] = $followerCount;
            $followingCounts[$writer->id] = $followingCount;
        }
    
        return view('writers.writers', [
            'title' => 'Elibin | Penulis',
            'active' => 'penulis',
            'writers' => $writers,
            'followerCounts' => $followerCounts, // Pass the follower counts to the view
            'followingCounts' => $followingCounts, // Pass the following counts to the view
        ]);
    }    
    

    public function detail($id)
    {
        $writer = User::where('role', 'penulis')->find($id);
        $user = auth()->user();
    
        // Check if the user is following the writer
        $isFollowing = Follow::where('user_id', $user->id)
            ->where('follows_user_id', $writer->id)
            ->exists();
    
        $followerCount = Follow::where('follows_user_id', $id)->count();
        $followingCount = Follow::where('user_id', $id)->count();
    
        return view('writers.writer', [
            'title' => 'Elibin | Penulis',
            'active' => 'penulis',
            'writer' => $writer,
            'follower' => $followerCount,
            'following' => $followingCount,
            'isFollowing' => $isFollowing, 
        ]);
    }    
    
}
