@extends('layouts.main')

@section('container')
    <div class="flex flex-row text-white gap-1 items-center p-2">
        <a href="/" class="text-sky-400">Dashboard</a>/
        <a href="account/{{ Auth::user()->id }}" class="text-sky-400">Profile</a>/
        <a href="/follower/{{ Auth::user()->id }}" class="text-sky-400">Blacklist</a>
    </div>
    <div class="bg-slate-800 w-full h-max border rounded-md shadow-md text-slate-300">
        <div class="p-4">
            <div class="text-center text-sm">Blacklist</div>
        </div>
        <div class="mt-4 w-full flex flex-col p-6 gap-3">
            @foreach($books as $book)
            <a href="/book/{{ $book->id }}" class="flex flex-row items-center gap-3">
                <div>
                    <img src="{{ $book->gambar }}" alt="{{ $book->username }}" class="w-16 h-14">
                </div>
                <div class="flex flex-col w-full">
                    <span class="border-b">{{ $book->judul }}</span>
                    <div class="flex flex-row gap-1">
                        <span>{{ $book->penulis }}</span> 
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection 