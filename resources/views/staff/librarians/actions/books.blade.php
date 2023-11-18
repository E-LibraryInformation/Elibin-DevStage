@extends('layouts.admin')

@section('container')
    <div class="w-full bg-slate-800 h-max p-4 text-slate-300 flex flex-col border rounded-lg">
        <div>
            <h5 class="text-lg">Management Your Books</h5>
        </div>
        @if(session('successDestroy'))
        <div class="mt-2 bg-slate-600 border border-red-400 w-full h-max p-3 rounded-lg">
            <p>{{ session('successDestroy') }}</p>
        </div>
        @endif
        @if(session('errorDestroy'))
        <div class="mt-2 bg-slate-600 border border-red-400 w-full h-max p-3 rounded-lg">
            <p>{{ session('errorDestroy') }}</p>
        </div>
        @endif
        <div class="mt-6">
            <div>
                <a href="/staff/librarians/books/create" class="bg-sky-500 text-white font-medium py-2 px-3 rounded-lg hover:bg-sky-400 hover:duration-150">Tambah Data</a>
            </div>
            <table class="table-fixed text-center w-full mt-4">
                <thead class="bg-white text-slate-900 font-bold">
                    <tr>
                        <td>ID</td>
                        <td>Book</td>
                        <td>Writer</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr class="">
                            <td>{{ $book->id }}</td>
                            <td> {{ strlen($book->judul) > 20 ? substr($book->judul, 0, 20) : $book->judul }}</td>
                            <td>{{ $book->penulis }}</td>
                            <td class="flex flex-col justify-center gap-1 p-2 lg:flex-row">
                                <a href="/staff/librarians/books/edit/{{ $book->id }}" class="bg-yellow-500 rounded-lg px-3 py-2 text-white hover:bg-yellow-400 hover:duration-150"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="/staff/librarians/books/delete/{{ $book->id }}" class="bg-red-500 rounded-lg px-3 py-2 text-white hover:bg-red-400 hover:duration-150"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
