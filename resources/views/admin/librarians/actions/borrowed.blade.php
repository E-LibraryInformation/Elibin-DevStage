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
                            <th scope="col" class="py-3">
                                Book
                            </th>
                            <th scope="col" class="py-3">
                                Fullname
                            </th>
                            <th scope="col" class="py-3">
                                Username
                            </th>
                            <th>
                                Hari
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowings as $borrowing)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 font-bold text-white">
                                    {{ $borrowing->book->judul }} <!-- Akses atribut book -->
                                </td>
                                <td class="py-4">
                                    {{ $borrowing->user->fullname }} <!-- Akses atribut user -->
                                </td>
                                <td class="py-4">
                                    {{ $borrowing->user->username }} <!-- Akses atribut user -->
                                </td>
                                <td class="py-4">
                                    @php
                                        $daysLeft = $borrowing->hari - now()->diffInDays($borrowing->created_at);
                                        $textColor = $daysLeft >= 0 ? 'text-sky-500' : 'text-red-500';
                                        echo '<span class="' . $textColor . '">' . $daysLeft . '</span>';
                                    @endphp
                                </td>
                                <td class="py-4 font-bold">
                                    @php
                                    $status = $daysLeft >= 0 ? 'DIPINJAM' : 'OVERDUE';
                                    $textColorStatus = $status === 'DIPINJAM' ? 'text-lime-500' : 'text-red-500';
                                    echo '<span class="' . $textColorStatus . '">' . $status . '</span>';
                                @endphp
                                </td>
                                <td>
                                    <form action="/confirmEnd/{{ $borrowing->id }}" method="post">
                                        @csrf
                                        <button class="py-0 text-sky-500 border-b border-sky-500 hover:text-sky-400 hover:border-sky-400 hover:duration-150">sudah dikembalikan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
