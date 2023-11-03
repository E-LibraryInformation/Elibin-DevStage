@extends('layouts.admin')

@section('container')
    <div class="bg-slate-800 w-full h-max rounded-lg border text-slate-300">
        <div class="p-4 flex flex-col">
            <h5 class="text-md lg:text-lg">Selamat Datang <span class="font-bold">{{ Auth::user()->fullname }}</span> di dashboard Pustakawan</h5>
            <p class="text-slate-400 text-sm lg:text-md">let's organize your library</p>
        </div>
        <div class="w-full flex justify-center lg:justify-start">
            <div class="w-full flex flex-wrap justify-center p-4 gap-2 lg:flex-row lg:w-2/3 lg:justify-start">
                <a href="/staff/librarians/borrowing" class="bg-green-500 w-2/5 h-max rounded-lg flex flex-col lg:w-[200px] hover:bg-green-400 hover:duration-150">
                    <div class="p-2">
                        <h5 class="text-white font-semibold border-b border-white text-sm sm">Peminjaman({{ $countBorrowing }})</h5>
                    </div>
                    <div class="flex justify-end">
                        <i class="fa-brands fa-wpforms text-white mt-4 text-6xl"></i>
                     </div>
                </a>
                <a href="/staff/librarians/borrowed" class="bg-blue-500 w-2/5 h-max rounded-lg flex flex-col lg:w-[200px] hover:bg-blue-400 hover:duration-150">
                    <div class="p-2">
                        <h5 class="text-white font-semibold border-b border-white text-sm">Dipinjam({{ $countBorrowed }})</h5>
                    </div>
                    <div class="flex justify-end">
                        <i class="fa-solid fa-users-line text-white mt-4 text-6xl"></i>
                    </div>
                </a>
                <a href="/staff/librarians/books" class="bg-yellow-500 w-2/5 h-max rounded-lg flex flex-col lg:w-[200px] hover:bg-yellow-400 hover:duration-150">
                    <div class="p-2">
                        <h5 class="text-white font-semibold border-b border-white text-sm">Buku</h5>
                    </div>
                    <div class="flex justify-end">
                        <i class="fa-solid fa-book text-white mt-4 text-6xl"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col justify-center p-3 text-xs lg:justify-start lg:text-lg">
            <div>
                <h5 class="text-xl">Timeline Pustakawan</h5>
            </div>
            <div class="overflow-x-auto lg:w-full">
                <table class="text-center w-full">
                    <thead class="bg-slate-950">
                        <tr>
                            <th>ID</th>
                            <th>Buku</th>
                            <th>Penulis</th>
                            <th>Rak</th>
                            <th>Stok</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
