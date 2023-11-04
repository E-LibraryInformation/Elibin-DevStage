@extends('layouts.admin')

@section('container')
    <div class="bg-slate-800 w-full h-max rounded-lg flex flex-col text-slate-300">
        <div class="p-4">
            <h5 class="border-b text-lg lg:text-xl">Perpustakaan</h5>
        </div>
        <div class="p-4 mb-4">
            <form action="" class="flex flex-col gap-3 w-full">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <label for="library">Nama Perpustakaan</label>
                    <input type="text" class="bg-slate-700 border rounded-lg p-2 focus:outline-sky-500" placeholder="Nama Perpustakaan" id="library" name="library" value="{{ $library->library }}">
                </div>
                <div class="flex flex-col">
                    <label for="alamat">Alamat Perpustakaan</label>
                    <textarea type="text" class="bg-slate-700 border rounded-lg p-2 focus:outline-sky-500" placeholder="Nama Perpustakaan" id="alamat" name="alamat">{{ $library->alamat }}</textarea>
                </div>
                <div class="flex flex-col relative">
                    <label for="gmaps">Link Google Maps</label>
                    <input type="text" class="bg-slate-700 border rounded-lg p-2 focus:outline-sky-500" placeholder="Link Google Maps" id="gmaps" name="gmaps" value="{{ $library->gmaps }}">
                </div>
                <div class="flex justify-end">
                    <button class="bg-sky-500 rounded-lg p-2 text-white font-medium hover:bg-sky-400 hover:duration-150">Update Library Info</button>
                </div>
            </form>
        </div>
    </div>
@endsection
