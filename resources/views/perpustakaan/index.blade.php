@extends('layouts.main')

@section('container')
    <div class="flex flex-row text-white gap-1 items-center p-2">
        <a href="/" class="text-sky-400">Dashboard</a>/
        <a href="/perpustakaan" class="text-sky-400">Perpustakaan</a>
    </div>
    <div class="bg-slate-800 border rounded-lg w-full h-max shadow-md text-slate-300">
        <div class="p-4">
            Perpustakaan
        </div>
        <div class="flex justify-center flex-wrap gap-4 p-4 pb-14 lg:justify-start">
            <a href="/perpustakaan/information" class="bg-green-500 text-white w-72 rounded-lg mb-6 hover:bg-green-400 hover:duration-150">
                <div class="p-4 w-full">
                    <h5 class="font-bold border-b">Informasi Perpustakaan</h5>
                </div>
                <div class="flex justify-end">
                    <i class="fa-solid fa-school text-8xl"></i>
                </div>
            </a>
            <a href="/perpustakaan/pustakawan" class="bg-sky-500 text-white w-72 rounded-lg mb-6 hover:bg-sky-400 hover:duration-150">
                <div class="p-4 w-full">
                    <h5 class="font-bold border-b">Pustakawan({{ $jumlahPustakawan }})</h5>
                </div>
                <div class="flex justify-end">
                    <i class="fa-solid fa-users text-8xl"></i>
                </div>
            </a>
        </div>
    </div>
@endsection