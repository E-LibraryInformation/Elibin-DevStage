@extends('layouts.main')

@section('container')
<div class="flex flex-row text-white gap-1 items-center p-2">
    <a href="/" class="text-sky-400">Dashboard</a>/
    <a href="/perpustakaan" class="text-sky-400">Perpustakaan</a>/
    <a href="/perpustakaan/information" class="text-sky-400">Informasi Perpustakaan</a>
</div>
<div class="bg-slate-800 w-full h-max border rounded-lg shadow-md text-slate-300">
    <div class="p-4">
        Informasi Perpustakaan
    </div>
    <ul class="ml-9 mb-24">
        <li>
            <a class="text-sky-400" href="/perpustakaan/information/log">Log Buku Masuk</a>
        </li>
        <li>
            <a class="text-sky-400" href="/perpustakaan/information/pustakawan">Pustakawan</a>
        </li>
        <li>
            <a class="text-sky-400" href="/perpustakaan/information/libprofile">Informasi Perpustakaan</a>
        </li>
    </ul>
</div>
@endsection