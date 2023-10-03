@extends('layouts.main')

@section('container')
    <div class="bg-slate-800 w-full h-max border rounded-md shadow-md text-slate-300">
        <div class="p-4">
            Elibin Profile
        </div>
        <div class="p-4">
            <div class="w-full flex flex-col">
                <form class="flex flex-col justify-center gap-6 md:flex-row 2xl:justify-between" action="" method="post" enctype="multipart/form-data" id="profileForm">
                    @csrf
                    <div class="flex flex-col w-72 mx-auto">
                        <img src="{{ asset(Auth::user()->gambar) }}" alt="{{ Auth::user()->username }}" class="rounded-full mx-auto w-32 h-32 my-auto">
                        <input class="w-60 border border-sky-400 p-2 rounded-lg mt-4 mx-auto my-auto" type="file" id="gambar" name="gambar" value="{{ asset(Auth::user()->gambar) }}">
                        <div class="flex flex-row justify-center gap-4">
                            <span>Followers : {{ $followersCount }}</span>|
                            <span>Following : {{ $followingCount }}</span>
                        </div>            
                    </div>
                    <div class="flex flex-col grow gap-4">
                        <div class="flex flex-col">
                            <label for="fullname">Fullname</label>
                            <input class="placeholder:text-slate-800 text-slate-800 w-full p-2 rounded-lg" type="text" id="fullname" name="fullname" placeholder="{{ Auth::user()->fullname }}" value="{{ Auth::user()->fullname }}">
                        </div>
                        <div class="flex flex-col">
                            <label for="username">Username</label>
                            <input class="placeholder:text-slate-800 text-slate-800 w-full p-2 rounded-lg" type="text" id="username" name="username" placeholder="{{ Auth::user()->username }}" value="{{ Auth::user()->username }}">
                        </div>
                        <div class="flex flex-col">
                            <label for="bio">Bio</label>
                            <textarea class="placeholder:text-slate-800 text-slate-800 w-full p-2 rounded-lg" type="text" id="bio" name="bio" placeholder="{{ Auth::user()->bio }}">{{ Auth::user()->bio }}</textarea>
                        </div>
                        <div class="flex flex-col">
                            <label for="role">Role</label>
                            <input class="placeholder:text-slate-800 placeholder:uppercase text-slate-800 w-full p-2 rounded-lg" type="text" id="role" name="role" readonly placeholder="{{ Auth::user()->role }}">
                            <p class="w-full text-slate-400"><span class="uppercase text-sky-400">pembaca</span> adalah role default yang kami berikan, apabila anda ingin mengubahnya menjadi <span class="uppercase text-red-400">penulis</span> atau <span class="uppercase text-yellow-400">pustakawan</span> maka diperlukan akses dari role <span class="uppercase text-purple-400">ADMIN</span>. <a href="#" class="text-sky-400">pelajari lebih lanjut</a></p>
                        </div>
                        <div class="flex flex-col justify-end">
                            <button type="submit" class="bg-sky-500 rounded-lg p-2 text-slate-800 w-36 font-medium hover:bg-sky-400 hover:duration-150" id="simpanButton" disabled>Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
