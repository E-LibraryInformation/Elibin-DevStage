@extends('layouts.main')

@section('container')
    <div class="flex flex-row text-white gap-1 items-center p-2">
        <a href="/" class="text-sky-400">Dashboard</a>/
        <a href="/" class="text-sky-400">{{ $profile->fullname }}</a>/
        <a href="/follower/{{ $id }}" class="text-sky-400">Followers</a>
    </div>
    <div class="bg-slate-800 w-full h-max border rounded-md shadow-md text-slate-300">
        <div class="p-4">
            <div class="text-center text-sm">Following</div>
        </div>
        <div class="mt-4 w-full flex flex-col p-6 gap-3">
            @foreach($users as $user)
            <a href="/profile/{{ $user->id }}" class="flex flex-row items-center gap-3">
                <div>
                    <img src="{{ $user->gambar }}" alt="{{ $user->username }}" class="w-16 h-14 rounded-full">
                </div>
                <div class="flex flex-col w-full">
                    <span class="border-b">{{ $user->fullname }}</span>
                    <div class="flex flex-row gap-1">
                        <span>{{ $user->username }}</span> -
                        @if($user->role === 'pembaca')
                        <span class="uppercase font-bold text-sky-400">pembaca</span>
                        @elseif($user->role === 'penulis')
                        <span class="uppercase font-bold text-red-400">penulis</span>
                        @elseif($user->role === 'pustakawan')
                        <span class="uppercase font-bold text-yellow-400">pustakawan</span>
                        @elseif($user->role === 'admin')
                        <span class="uppercase font-bold text-purple-400">admin</span>
                        @endif
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection
