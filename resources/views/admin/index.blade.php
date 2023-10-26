@extends('layouts.main')

@section('container')
    <div class="bg-slate-800 w-full h-max rounded-lg border text-slate-300 mt-6 lg:mt-0">
        <div class="flex flex-col p-4">
            <div>
                <h5 class="text-xl md:text-2xl">Hi <span class="font-bold">{{ Auth::user()->fullname }}</span>, you logged as <span class="font-medium capitalize">{{ Auth::user()->role }}</span>.</h5>
                <p class="text-slate-400">Menu yang bisa anda akses sebagai {{ Auth::user()->role }}</p>
            </div>
            <div class="flex flex-wrap w-full mb-4 mt-10 gap-3 justify-center">
                @if(Auth::user()->role == 'admin')
                <a href="" class="bg-yellow-500 rounded-lg w-full md:w-48 lg:w-80 flex flex-col hover:bg-yellow-400 hover:duration-150">
                    <div class="p-3">
                        <h5 class="text-xl text-white font-bold border-b border-white">Library</h5>
                    </div>
                    <div class="flex justify-end mt-6">
                        <i class="fa-solid fa-school text-white text-9xl"></i>
                    </div>
                </a>
                <a href="" class="bg-sky-500 rounded-lg w-full md:w-48 lg:w-80 flex flex-col hover:bg-sky-400 hover:duration-150">
                    <div class="p-3">
                        <h5 class="text-xl text-white font-bold border-b border-white">Admins({{ $countAdmin }})</h5>
                    </div>
                    <div class="flex justify-end mt-6">
                        <i class="fa-solid fa-clipboard-user text-white text-9xl"></i>
                    </div>
                </a>
                <a href="" class="bg-green-500 rounded-lg w-full md:w-48 lg:w-80 flex flex-col hover:bg-green-400 hover:duration-150">
                    <div class="p-3">
                        <h5 class="text-xl text-white font-bold border-b border-white">Users({{ $countUser }})</h5>
                    </div>
                    <div class="flex justify-end mt-6">
                        <i class="fa-solid fa-users text-white text-9xl"></i>
                    </div>
                </a>
                @endif
                @if(Auth::user()->role == 'pustakawan' || Auth::user()->role == 'admin')
                <a href="" class="bg-slate-500 rounded-lg w-full md:w-48 lg:w-80 flex flex-col hover:bg-slate-400 hover:duration-150">
                    <div class="p-3">
                        <h5 class="text-xl text-white font-bold border-b border-white">Librarians({{ $countLibrarians }})</h5>
                    </div>
                    <div class="flex justify-end mt-6">
                        <i class="fa-solid fa-chalkboard-user text-white text-9xl"></i>
                    </div>
                </a>
                <a href="" class="bg-red-500 rounded-lg w-full md:w-48 lg:w-80 flex flex-col hover:bg-red-400 hover:duration-150">
                    <div class="p-3">
                        <h5 class="text-xl text-white font-bold border-b border-white">Borrow({{ $countBorrowings }})</h5>
                    </div>
                    <div class="flex justify-end mt-6">
                        <i class="fa-solid fa-book-open-reader text-white text-9xl"></i>
                    </div>
                </a>
                <a href="" class="bg-purple-500 rounded-lg w-full md:w-48 lg:w-80 flex flex-col hover:bg-purple-400 hover:duration-150">
                    <div class="p-3">
                        <h5 class="text-xl text-white font-bold border-b border-white">Book Management</h5>
                    </div>
                    <div class="flex justify-end mt-6">
                        <i class="fa-solid fa-book text-white text-9xl"></i>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
@endsection
