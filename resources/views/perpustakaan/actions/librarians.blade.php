@extends('layouts.main')

@section('container')
    <div class="flex flex-row text-white gap-1 items-center p-2">
        <a href="/" class="text-sky-400">Dashboard</a>/
        <a href="/books" class="text-sky-400">Books</a>
    </div>
    <div class="bg-slate-700 w-full h-max border rounded-md shadow-md text-slate-300">
        <div class="p-4">
            <div class="text-xl">Elibin</div>
        </div>
        <div class="md:p-4 flex flex-wrap justify-center gap-6">
            <div class="bg-slate-600 border rounded-lg w-full h-max p-4">
                <form action="/cariBuku" method="get">
                    @csrf
                    {{-- <div id="search" class="flex gap-0">
                        <input type="text" id="cariBuku" name="cariBuku" class="w-full rounded-l-lg p-2 text-black lg:w-1/2 focus:outline-sky-400" placeholder="Cari Buku...">
                        <button type="submit" class="bg-sky-500 text-white p-2 rounded-r-lg hover:bg-sky-400 hover:duration-150"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div> --}}
                </form>
            </div>
            @foreach ($librarians as $librarian)
            <a href="/book/{{ $librarian->id }}" class="bg-slate-800 border border-white rounded-lg w-2/5 h-max overflow-hidden md:w-48 md:h-max hover:-translate-x-2 hover:-translate-y-2 hover:shadow-lg hover:shadow-purple-500 hover:duration-200">
                <div>
                    <img src="{{ $librarian->gambar }}" alt="{{ $librarian->judul }}" class="w-48">
                </div>
                <div class="p-2 text-sm text-slate-300 flex flex-col">
                    <div class="text-slate-400 text-xs">
                        ID: {{ $librarian->id }}
                    </div>
                    <div class="font-bold w-full text-xs">
                        {{  substr($librarian->judul, 0, 16) . '...' }}
                    </div>
                    <div>
                        <p class="text-xs">{{ substr($librarian->sinopsis, 0, 6) . '...' }}</p>
                    </div>
                    <div class="text-xs">
                        Penulis: <span class="text-slate-400">{{ substr($librarian->penulis, 0, 6) . '...' }}</span>
                    </div>
                    <div class="text-xs">
                        Rak: <span class="text-sky-400">{{ $librarian->rak }}</span>
                    </div>
                    <div class="text-xs">
                        Stok: <span class="text-slate-400">{{ $librarian->stok }}</span>
                    </div>
                    <div class="text-xs">
                        Status : <span class="font-semibold {{ ($librarian->status === 'Available') ? 'text-lime-400' : 'text-red-400' }}">{{ $librarian->status }}</span>
                    </div>
                    <div class="text-xs">
                        {{-- @include('partials.rating') <span class="text-yellow-400">{{ $librarian->rating }}</span> --}}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mx-2 my-2 flex justify-center">
            {{ $librarians->links() }}
        </div>
    </div>
@endsection
