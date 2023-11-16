@extends('layouts.admin')

@section('container')
    <div class="bg-slate-800 w-full h-max p-4 rounded-lg text-slate-300">
        <div class="mb-4">
            <h5 class="text-lg font-bold lg:text-xl">Edit Data Buku</h5>
        </div>
        <div class="p-8 border rounded-lg">
            <form action="" method="post" class="flex flex-col gap-3" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" id="lib_id" name="lib_id" value="{{ Auth::user()->id }}">
                <div class="flex flex-col">
                    <label for="judul">Title Buku</label>
                    <input type="text" class="bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Title Buku" id="judul" name="judul" value="{{ $book->judul }}">
                </div>
                <div class="flex flex-col">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea type="text" class="bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Sinopsis" id="sinopsis" name="sinopsis">{{ $book->sinopsis }}</textarea> 
                </div>
                <div class="flex flex-col">
                    <label for="stok">Stok</label>
                    <input type="number" class="bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Stok" id="stok" name="stok" value="{{ $book->stok }}">
                </div>
                <div class="flex flex-col">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Penulis" id="penulis" name="penulis" value="{{ $book->penulis }}">
                </div>
                <div class="flex flex-col">
                    <label for="judul">Rak</label>
                    <input type="text" class="bg-slate-700 border rounded-lg p-2 focus:outline-none" placeholder="Rak" id="rak" name="rak" value="{{ $book->rak }}">
                </div>
                <div class="flex flex-col">
                    <label for="gambar">Gambar Buku</label>
                    <input type="file" class="bg-slate-700 border rounded-lg p-2 focus:outline-none" id="gambar" name="gambar" value="{{ $book->gambar }}">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-sky-500 px-3 py-2 text-white font-medium rounded-lg hover:bg-sky-400 hover:duration-150">Edit Buku</button>
                </div>
            </form>
        </div>
    </div>
@endsection
