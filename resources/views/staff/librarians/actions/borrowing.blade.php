@extends('layouts.admin')

@section('container')
    <div class="bg-slate-800 w-full h-max rounded-lg border text-slate-300">
        <div class="flex flex-col p-4">
            <h5 class="text-md lg:text-lg">Forum Peminjaman</h5>
        </div>
        <div class="w-full p-4 lg:p-0">
            <div class="relative overflow-x-auto">
                <table class="table-fixed text-xs lg:text-lg text-center w-full text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class=" py-3">
                                Book
                            </th>
                            <th scope="col" class=" py-3">
                                Fullname
                            </th>
                            <th scope="col" class=" py-3">
                                Username
                            </th>
                            <th scope="col" class=" py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class=" py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ strlen($data->judul) > 6 ? substr($data->judul, 0, 6) : $book->judul }}
                            </th>
                            <td class=" py-4">
                                {{ strlen($data->fullname) > 6 ? substr($data->fullname, 0, 6) : $book->judul }}
                            </td>
                            <td class=" py-4">
                                {{ $data->username }}
                            </td>
                            <td class=" py-4">
                                <form action="/confirmBorrow/{{ $data->id }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $data->user_id }}">
                                    <input type="hidden" value="{{ $data->book_id }}">
                                    <input type="hidden" value="{{ $data->hari }}">
                                    <button class="py-0 text-sky-500 border-b border-sky-500 hover:text-sky-400 hover:border-sky-400 hover:duration-150">confirm</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $datas->links() }}
        </div>
    </div>
@endsection
