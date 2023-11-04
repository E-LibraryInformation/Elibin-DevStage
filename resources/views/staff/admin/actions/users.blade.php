@extends('layouts.admin')

@section('container')
    <div class="bg-slate-800 w-full h-max flex flex-col text-slate-300 rounded-lg">
        <div class="p-4">
            <h5 class="text-lg font-bold">List Table Users</h5>
        </div>
        <div class="w-full p-4">
            <form action="/staff/admin/users/search" method="get" class="w-full">
                @csrf
                <div class="flex flex-row w-full">
                    <input type="text" name="searchUser" id="searchUser" class="w-full p-2 bg-slate-700 border rounded-l-lg focus:outline-sky-500" placeholder="Cari Pengguna...">
                    <button class="bg-sky-500 text-white border font-semibold p-2 rounded-r-lg"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <table class="table-auto w-full text-center text-xs mt-2">
                <thead class="bg-slate-700">
                    <th class="p-1">ID</th>
                    <th class="p-1">Fullname</th>
                    <th class="p-1">Username</th>
                    <th class="p-1">Action</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="p-1">
                        <td class="p-1">{{ $user->id }}</td>
                        <td class="p-1">{{ $user->fullname }}</td>
                        <td class="p-1">{{ $user->username }}</td>
                        <td class="p-1 flex flex-col justify-center items-center gap-1 lg:flex-row">
                            <form action="/staff/admin/users/role/{{ $user->id }}">
                                @csrf
                                @method('PUT')
                                <select name="role" id="role" class="bg-slate-700 uppercase p-2 rounded-lg w-full">
                                    <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                    <option value="penulis">penulis</option>
                                    <option value="pustakawan">pustakawan</option>
                                    <option value="admin">admin</option>
                                </select>
                            </form>
                            <a href="/staf/admin/users/delete{{ $user->id }}" class="bg-red-500 rounded-lg w-ful p-2 text-white font-medium hover:bg-red-400 hover:duration-150">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
