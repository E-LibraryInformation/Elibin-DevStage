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
                                Judul
                            </th>
                            <th scope="col" class="py-3">
                                Username
                            </th>
                            <th scope="col" class="py-3">
                                Tanggal
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
                            @php
                                $createdAt = \Carbon\Carbon::parse($borrowing->created_at);
                                $now = \Carbon\Carbon::now();
                                $borrowedDays = $borrowing->hari; // Batas waktu peminjaman dalam hari
                                $daysPassed = $createdAt->diffInDays($now); // Menghitung perbedaan hari dari created_at hingga sekarang

                                // Menghitung sisa hari yang tersedia untuk pengembalian
                                $remainingDays = $borrowedDays - $daysPassed;
                                $isLate = $remainingDays <= 0; // Jika sisa hari kurang dari atau sama dengan 0, berarti telat
                                $daysToShow = $isLate ? abs($remainingDays) : $remainingDays; // Nilai yang ditampilkan

                                // Jika nilai $daysToShow negatif, atur ke 0 untuk menghindari angka negatif yang tidak masuk akal
                                $daysToShow = max(0, $daysToShow);

                                // Mengubah status menjadi "TELAT" jika sisa hari sudah 0 atau negatif
                                $status = $isLate ? 'TELAT' : 'DIPINJAM';
                            @endphp

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 font-bold text-white">
                                    {{ $borrowing->book->judul }}
                                </td>
                                <td class="py-4">
                                    {{ $borrowing->user->username }}
                                </td>
                                <td class="py-4">
                                    {{ $borrowing->created_at }}
                                </td>
                                <td class="py-4 {{ $isLate ? 'text-red-400' : 'text-lime-400' }}">
                                    {{ $daysToShow }}
                                </td>
                                <td class="py-4 font-bold {{ $isLate ? 'text-red-400' : 'text-lime-400' }}">
                                    {{ $isLate ? 'TELAT' : 'DIPINJAM' }}
                                </td>
                                <td>
                                    <form action="/confirmEnd/{{ $borrowing->id }}" method="post">
                                        @csrf
                                        <button
                                            class="py-0 text-sky-500 border-b border-sky-500 hover:text-sky-400 hover:border-sky-400 hover:duration-150">sudah
                                            dikembalikan</button>
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
