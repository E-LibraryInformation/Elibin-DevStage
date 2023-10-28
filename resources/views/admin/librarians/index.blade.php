@extends('layouts.admin')

@section('container')
    <div class="bg-slate-800 w-full h-max rounded-lg border text-slate-300">
        <div class="p-4 flex flex-col">
            <h5 class="text-md">Selamat Datang <span class="font-bold">{{ Auth::user()->fullname }}</span> di dashboard Pustakawan</h5>
            <p class="text-slate-400 text-sm">let's organize your library</p>
        </div>
        <div class="flex flex-wrap justify-center p-4 gap-2">
            <a href="" class="bg-green-500 w-2/5 h-max rounded-lg flex flex-col hover:bg-green-400 hover:duration-150">
                <div class="p-2">
                    <h5 class="text-white font-semibold border-b border-white text-sm sm">Peminjaman({{ $countBorrow }})</h5>
                </div>
                <div class="flex justify-end">
                    <i class="fa-solid fa-book text-white mt-4 text-6xl"></i>
                 </div>
            </a>
            <a href="" class="bg-blue-500 w-2/5 h-max rounded-lg flex flex-col hover:bg-blue-400 hover:duration-150">
                <div class="p-2">
                    <h5 class="text-white font-semibold border-b border-white text-sm">Dipinjam()</h5>
                </div>
                <div class="flex justify-end">
                    <i class="fa-solid fa-book-open text-white mt-4 text-6xl"></i>
                </div>
            </a>
        </div>
        <div class="w-full flex justify-center p-3 text-xs">
            <div class="overflow-x-auto">
                <table class="text-center w-full">
                    <thead class="bg-slate-950">
                        <tr>
                            <th>ID</th>
                            <th>Buku</th>
                            <th>Penulis</th>
                            <th>Rak</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-600 text-white">
                        @foreach($books as $book)
                        <tr class="hover:bg-slate-500 hover:duration-150">
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->penulis }}</td>
                            <td>{{ $book->rak }}</td>
                            <td>{{ $book->stok }}</td>
                            <td class="flex flex-col">
                                <a href="" class="bg-red-500 p-3 hover:bg-red-400 hover:duration-150"><i class="fa-solid fa-trash text-xl"></i></a>
                                <a href="" class="bg-yellow-500 p-3 hover:bg-yellow-400 hover:duration-150"><i class="fa-solid fa-pen-to-square text-xl"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end mt-3">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
