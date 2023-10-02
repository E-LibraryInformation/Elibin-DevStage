@extends('layouts.main')

@section('container')
<div class="flex flex-row text-white gap-1 items-center p-2">
    <a href="/" class="text-sky-400">Dashboard</a>/<a href="/writer" class="text-sky-400">Penulis</a>
</div>
<div class="bg-slate-800 w-full h-max border rounded-md shadow-md text-slate-300">
    <div class="p-4">
        <span class="text-xl">Elibin</span>
    </div>
    <div class="w-full h-max flex flex-col">
        <div class="text-sm text-center mt-3">
            Penulis Terpopuler
        </div>
        <div class="md:p-4 flex flex-wrap justify-center gap-4">
            @foreach ($writers as $writer)
            <a href="/writer/{{ $writer->id }}" class="bg-slate-800 border border-white rounded-lg w-2/5 h-max overflow-hidden md:w-48 md:h-max hover:-translate-x-2 hover:-translate-y-2 hover:shadow-lg hover:shadow-purple-500 hover:duration-200">
                <div>
                    <img src="{{ $writer->gambar }}" alt="{{ $writer->fullname }}" class="w-48">
                </div>
                <div class="p-2 text-sm text-slate-300 flex flex-col">
                    <div class="text-slate-400 text-xs">
                        ID: {{ $writer->id }}
                    </div>
                    <div class="font-bold w-full text-xs">
                        {{  $writer->fullname }}
                    </div>
                    <div>
                        <p class="text-xs">{{ $writer->username }}</p>
                    </div>
                    <div class="text-xs">
                        <span class="text-red-400 uppercase font-bold">{{ $writer->role }}</span>
                    </div>
                    {{-- <div class="text-xs">
                        @include('partials.rating') <span class="text-yellow-400">{{ $writer->rating }}</span>
                    </div> --}}
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="mx-2 my-2 flex justify-center">
        {{-- {{ $writers->links('pagination::tailwind') }} --}}
    </div>
</div>
@endsection
