@extends('layouts.admin')

@section('container')
    <div class="bg-slate-800 w-full h-max rounded-lg text-slate-300">
        <div class="p-4 flex flex-col">
            <h5 class="text-md lg:text-lg">Selamat Datang <span class="font-bold">{{ Auth::user()->fullname }}</span> di Menu Admin</h5>
            <p class="text-slate-400 text-sm lg:text-md">let's settings your library</p>
        </div>
        <div class="p-4 flex flex-col justify-center mt-6">
            <div class="w-full flex flex-row text-white gap-1">
                <a href="/staff/admin/library" class="bg-sky-500 w-full h-max rounded-lg flex flex-col hover:bg-sky-400 hover:duration-150">
                    <div class="border-b border-white">
                        <h5 class="p-1 text-lg font-bold">Library</h5>
                    </div>
                    <div class="mt-4 h-full flex justify-end items-end">
                        <i class="fa-solid fa-school text-white text-7xl lg:text-9xl"></i>
                    </div>
                </a>
            </div>
            <div class="w-full flex flex-col lg:flex-row">
                <div class="w-full flex flex-row text-white gap-1 mt-1 lg:gap-2">
                    <a href="/staff/admin/users" class="bg-green-500 w-1/2 lg:w-full max rounded-lg flex flex-col hover:bg-green-400 hover:duration-150">
                        <div class="border-b border-white">
                            <h5 class="p-1 text-lg font-bold">Users({{ $countUser }})</h5>
                        </div>
                        <div class="mt-6 h-full flex justify-end items-end">
                            <i class="fa-solid fa-users text-white text-5xl lg:text-7xl"></i>
                        </div>
                    </a>
                    <a href="/staff/admin/admin" class="bg-purple-500 w-1/2 lg:w-full max rounded-lg flex flex-col hover:bg-purple-400 hover:duration-150">
                        <div class="border-b border-white">
                            <h5 class="p-1 text-lg font-bold">Admin({{ $countAdmin }})</h5>
                        </div>
                        <div class="mt-6 h-full flex justify-end items-end">
                            <i class="fa-solid fa-user-secret text-white text-5xl lg:text-7xl"></i>
                        </div>
                    </a>
                </div>
                <div class="mx-1"></div>
                <div class="w-full flex flex-row text-white gap-1 mt-1 lg:gap-2">
                    <a href="/staff/admin/librarians" class="bg-yellow-500 w-1/2 lg:w-full max rounded-lg flex flex-col hover:bg-yellow-400 hover:duration-150">
                        <div class="border-b border-white">
                            <h5 class="p-1 text-lg font-bold">Librarians({{ $countLibrarians }})</h5>
                        </div>
                        <div class="mt-6 h-full flex justify-end items-end">
                            <i class="fa-solid fa-users text-white text-5xl lg:text-7xl"></i>
                        </div>
                    </a>
                    <a href="/staff/admin/writers" class="bg-red-500 w-1/2 lg:w-full max rounded-lg flex flex-col hover:bg-red-400 hover:duration-150">
                        <div class="border-b border-white">
                            <h5 class="p-1 text-lg font-bold">Writers({{ $countWriters }})</h5>
                        </div>
                        <div class="mt-6 h-full flex justify-end items-end">
                            <i class="fa-solid fa-masks-theater text-white text-5xl lg:text-7xl"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
