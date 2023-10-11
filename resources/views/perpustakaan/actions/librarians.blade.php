@extends('layouts.main')

@section('container')
<div class="flex flex-row text-white gap-1 items-center p-2">
    <a href="/" class="text-sky-400">Dashboard</a>/
    <a href="/perpustakaan" class="text-sky-400">Perpustakaan</a>/
    <a href="/perpustakaan/librarians" class="text-sky-400">Pustakawan</a>
</div>
<div class="bg-slate-800 w-full h-max border rounded-md shadow-md text-slate-300">
    <div class="p-4">
        <span class="text-xl">Elibin</span>
    </div>
    <div class="w-full h-max flex flex-col">
        <div class="md:p-4 flex flex-wrap justify-center gap-6">
            <div class="bg-slate-600 border rounded-lg w-full h-max p-4">
                <form action="/perpustakaan/cariPustakawan" method="get">
                    @csrf
                    <div id="search" class="flex gap-0">
                        <input type="text" id="cariPustakawan" name="cariPustakawan" class="w-full rounded-l-lg p-2 text-black lg:w-1/2 focus:outline-sky-400" placeholder="Cari Pustakawan...">
                        <button type="submit" class="bg-sky-500 text-white p-2 rounded-r-lg hover:bg-sky-400 hover:duration-150"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            @foreach ($librarians as $librarian)
            <a href="/profile/{{ $librarian->id }}" class="bg-slate-800 border border-white rounded-lg w-2/5 h-max overflow-hidden md:w-48 md:h-max hover:-translate-x-2 hover:-translate-y-2 hover:shadow-lg hover:shadow-purple-500 hover:duration-200">
                <div>
                    <img src="{{ $librarian->gambar }}" alt="{{ $librarian->fullname }}" class="w-48">
                </div>
                <div class="p-2 text-sm text-slate-300 flex flex-col">
                    <div class="text-slate-400 text-xs">
                        ID: {{ $librarian->id }}
                    </div>
                    <div class="font-bold w-full text-xs">
                        {{  $librarian->fullname }}
                    </div>
                    <div>
                        <p class="text-xs">{{ $librarian->username }}</p>
                    </div>
                    <div class="text-xs">
                        <span class="text-yellow-400 uppercase font-bold">{{ $librarian->role }}</span>
                    </div>
                    <div class="text-xs flex flex-row gap-2">
                        <span>Followers : {{ $followerCounts[$librarian->id] }}</span>|
                        <p>Following: {{ $followingCounts[$librarian->id] }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="mx-2 my-2 flex justify-center">
        {{ $librarians->links() }}
    </div>
</div>
@endsection