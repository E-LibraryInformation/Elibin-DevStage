@extends('layouts.main')

@section('container')
<div class="flex flex-row text-white gap-1 items-center p-2">
    <a href="/" class="text-sky-400">Dashboard</a>/
    <a href="/writers" class="text-sky-400">Penulis</a>/
    <a href="/writer/{{ $writer->id }}" class="text-sky-400">{{ $writer->fullname }}</a>
</div>
<div class="bg-slate-800 border rounded-lg justify-between p-4 flex flex-col gap-5 lg:flex-row">
    <div class="w-full h-[473px]} bg-slate-700 rounded-lg flex flex-col justify-center p-5 lg:w-72">
        <div class="p-5 flex justify-center">
            <img src="{{ $writer->gambar }}" alt="{{ $writer->fullname }}" class="border-2 rounded-full w-40 h-24  md:w-56 md:h-52">
        </div>
        <div class="flex flex-col gap-3">
            <div class="text-center font-bold text-slate-300 text-2xl">
                {{ $writer->fullname }}
            </div>
            <div class="text-center font-bold text-red-400 text-xl uppercase">
                {{ $writer->role }}
            </div>
            <div class="flex flex-wrap justify-center gap-2 text-slate-300 md:flex-row">
                <span>Follower : <a href="#" class="hover:text-sky-400 hover:duration-150">{{ $follower }}</a></span>|
                <span>Following : <a href="#" class="hover:text-sky-400 hover:duration-150">{{ $following }}</a></span>
            </div>
            <form action="/follow/{{ $writer->id }}" method="post" class="w-full text-center">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @if($writer->id !== Auth::user()->id)
                    <button type="submit" class="text-center text-white font-medium rounded-lg p-1 bg-sky-500 w-full hover:bg-sky-400 hover:duration-150">
                        @auth
                            @if ($isFollowing)
                                Unfollow
                            @else
                                Follow
                            @endif
                        @endauth
                    </button>
                @endif
            </form>                       
        </div>
    </div>
    <div class="w-full h-[473px] bg-slate-700 rounded-lg flex flex-col p-5 lg:w-3/5">
        <div class="text-3xl font-bold text-slate-200">
            Bio
        </div>
        <div>
            <p class="text-slate-300 text-justify">{{ $writer->bio }}</p>
        </div>
    </div>
    <div class="w-full h-[473px] bg-slate-700 rounded-lg flex flex-col p-5 lg:w-1/5">
        <div class="text-3xl font-bold text-slate-200">
            Elibin Badge
        </div>
        <div class="flex flex-wrap justify-center mt-5 gap-4">
            <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="badges" class="w-40 rounded-lg">
            <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="badges" class="w-40 rounded-lg">
            <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="badges" class="w-40 rounded-lg">
            <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="badges" class="w-40 rounded-lg">
            <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="badges" class="w-40 rounded-lg">
        </div>
    </div>
</div>
@endsection
