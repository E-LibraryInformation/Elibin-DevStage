@extends('layouts.main')

@section('container')
    <div class="flex flex-row text-white gap-1 items-center p-2">
        <a href="/" class="text-sky-400">Dashboard</a>/
        <a href="/upgrade" class="text-sky-400">Upgrade Account</a>/
    </div>
    <div class="bg-slate-800 rounded-lg border w-full h-max text-slate-300">
        <div class="p-4">
            <span class="text-sm">Upgrade Account</span>
        </div>
        <form action="" method="post" class="p-4 flex flex-col gap-4">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="flex flex-col">
                <label for="fullname">Fullname</label>
                <input type="text" id="fullname" name="fullname" class="w-full bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Nama Lengkap" disabled required value="{{ Auth::user()->fullname }}">
            </div>
            <div class="flex flex-col">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="w-full bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Username" disabled required value="{{ Auth::user()->username }}">
            </div>
            <div class="flex flex-col">
                <label for="nomor">Nomor Telepon</label>
                <input type="number" id="nomor" name="nomor" class="w-full bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Nomor Telepon" required min="1">
            </div>
            <div class="flex justify-end w-full">
                <button type="submit" class="bg-sky-500 p-2 rounded-lg text-white font-semibold hover:bg-sky-400 hover:duration-150">SEND</button>
            </div>
        </form>
    </div>
@endsection
