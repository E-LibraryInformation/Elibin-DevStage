@extends('layouts.main')

@section('container')
<div class="flex flex-row text-white gap-1 items-center">
    <a href="/" class="text-sky-400">Dashboard</a>/
    <a href="/books" class="text-sky-400">Books</a>/
    <a href="/book/{{ $book->id }}" class="text-sky-400">Detail</a>
</div>
<div class="bg-slate-800 border rounded-lg p-4 flex flex-col md:flex-row">
    <div class="flex justify-center">
        <img src="{{ asset($book->gambar) }}" alt="{{ $book->judul }}" class="w-96">
    </div>
    <div class="flex flex-col text-slate-300 px-2">
        <div class="font-bold text-xl">
            {{ $book->judul }}
        </div>
        <div class="text-sm">
            by <a href="#" class="text-sky-400">{{ $book->penulis }}</a>
        </div>
        <div class="text-sm">
            @include('partials.rating')
        </div>
        <div class="text-sm flex flex-row gap-2">
            <div>
                Stok: <span>{{ $book->stok }}</span>
            </div>
            |
            <div>
                Status: <span class="font-semibold {{ ($book->status === 'Available') ? 'text-lime-400' : 'text-red-400' }}">{{ $book->status }}</span>
            </div>
        </div>
        <div class="flex flex-col bg-slate-700 border rounded-lg p-3 mt-4   ">
            <span>Sinopsis:</span>
            <p class="font-semibold">{{ $book->sinopsis }}</p>
        </div>
        <div class="mt-6 flex flex-wrap gap-6">
            <a href="/pinjam/{{ $book->id }}" class="bg-sky-500 w-max h-max p-4 rounded-lg text-slate-100 font-semibold hover:bg-sky-600 hover:duration-150">
                <i class="fa-solid fa-book"></i> Lakukan Peminjaman
            </a>
            <a href="#" class="bg-red-500 w-max h-max p-4 rounded-lg text-slate-100 font-semibold hover:bg-red-600 hover:duration-150"><i class="fa-solid fa-book-skull"></i> Blacklist Buku</a>
            <a href="#" class="bg-yellow-500 w-max h-max p-4 rounded-lg text-slate-900 font-semibold hover:bg-yellow-600 hover:duration-150"><i class="fa-solid fa-bookmark"></i> Bookmark</a>
        </div>
    </div>
</div>
@endsection
