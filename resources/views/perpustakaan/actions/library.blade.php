@extends('layouts.main')

@section('container')
    <div class="flex flex-row text-white gap-1 items-center p-2">
        <a href="/" class="text-sky-400">Home</a>/
        <a href="/perpustakaan" class="text-sky-400">Library</a>/
        <a href="/information" class="text-sky-400">Information</a>
        <a href="perpustakaan/information/libprofile" class="text-sky-400">Informasi Perpustakaan</a>
    </div>
    <div class="mt-4 w-full rounded-lg border text-slate-300 flex flex-col bg-slate-800">
        <div class="p-4">
            <h5 class="font-bold text-lg lg:text-xl">Informasi Perpustakaan</h5>
        </div>
        <div class="p-4 w-full">
            <ul>
                <li>Perpustakaan: <span class="font-semibold">{{ $library->library }}</span></li>
                <li>Alamat: <span class="font-normal">{{ $library->alamat }}</span></li>
                <li>Jumlah Buku: <span class="font-medium">{{ $countBooks }}</span></li>
                <li>
                    <iframe src="{{ $library->gmaps }}" frameborder="0" class="rounded-lg w-full"></iframe>
                </li>
            </ul>
        </div>
    </div>
@endsection