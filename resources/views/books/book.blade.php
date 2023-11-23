@extends('layouts.main')

@section('container')
<div class="flex flex-row text-white gap-1 items-center p-2">
    <a href="/" class="text-sky-400">Dashboard</a>/
    <a href="/books" class="text-sky-400">Books</a>/
    <a href="/book/{{ $book->id }}" class="text-sky-400">{{ $book->judul }}</a>
</div>
<div class="bg-slate-800 rounded-lg p-4 flex flex-col">
    <div class="flex flex-col md:flex-row">

        <div class="flex justify-center">
            <img src="{{ asset($book->gambar) }}" alt="{{ $book->judul }}" class="w-96 rounded-lg">
        </div>
        <div class="flex flex-col text-slate-300 px-2">
            <div class="font-bold text-xl">
                {{ $book->judul }}
            </div>
            <div class="text-sm">
                by <a href="#" class="text-sky-400">{{ $book->penulis }}</a>
            </div>
            <div class="text-sm">
                @include('partials.rating') <span class="text-yellow-400">{{ $book->rating }}</span>
            </div>
            <div class="text-sm flex flex-row gap-2">
                <div>
                    Stok: <span>{{ $book->stok }}</span>
                </div>
                |
                <div>
                    Status: <span class="font-semibold {{ ($book->status === 'Available') ? 'text-lime-400' : 'text-red-400' }}">{{ $book->status }}</span>
                </div>
            </div>
            <div class="flex flex-col bg-slate-700 rounded-lg p-3 mt-4   ">
                <span>Sinopsis:</span>
                <p class="font-semibold">{{ $book->sinopsis }}</p>
            </div>
            <div class="mt-6 flex flex-wrap gap-6">
                <a href="/books/borrow/{{ $book->id }}" class="bg-sky-500 w-max h-max p-4 rounded-lg text-slate-100 font-semibold hover:bg-sky-600 hover:duration-150">
                    <i class="fa-solid fa-book"></i> Lakukan Peminjaman
                </a>
                <form action="{{ $bookIsBlacklisted ? '/unblacklist/'.$book->id : '/blacklist/'.$book->id }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="bg-red-500 w-max h-max p-4 rounded-lg text-slate-100 font-semibold hover:bg-red-600 hover:duration-150">
                        <i class="fa-solid fa-book-skull"></i> {{ $bookIsBlacklisted ? 'Unblacklist' : 'Blacklist' }} Buku
                    </button>                
                </form>  
                <form action="{{ $bookIsBookmarked ? '/unbookmark/'.$book->id : '/bookmark/'.$book->id }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="bg-yellow-500 w-max h-max p-4 rounded-lg text-slate-900 font-semibold hover:bg-yellow-600 hover:duration-150">
                        <i class="fa-solid fa-bookmark"></i> {{ $bookIsBookmarked ? 'In Bookmark' : 'Bookmark' }}
                    </button>                
                </form>            
            </div>
        </div>
    </div>
    <div class="w-full flex flex-col mt-4">
        <h5 class="text-lg lg:text-xl border-b border-slate-300">Review</h5>
        @if(session('successReview'))
        <div class="mt-4 bg-slate-700 w-full border border-sky-400 rounded-lg p-2">
            <p>{{ session('successReview') }}</p>
        </div>
        @endif
        <div class="mt-4">
            <form action="/books/review/{{ $book->id }}" method="post">
            @csrf
            @method('post')
            <div class="flex flex-col">
                <textarea placeholder="Masukkan Review Anda" id="review" name="review" class="w-full bg-slate-700 border rounded-lg p-2 outline-none" maxlength="600"></textarea>
                <span class="text-sm text-yellow-500">Peringatan: Maksimal 600 Huruf</span>
            </div>
            <button type="submit" class="mt-2 bg-sky-500 text-white font-semibold px-3 py-2 rounded-lg hover:bg-sky-400 hover:duration-150">Kirim</button>
            </form>
        </div>
        @foreach ($reviews as $review)    
        <div class="flex flex-col mt-4 bg-slate-700 p-2 rounded-lg">
            <div class="flex flex-row justify-between">
                <a href="" class="flex flex-row gap-3">
                    <div>
                        <img src="{{ $review->user->gambar }}" alt="example" class="w-12 h-12 rounded-full">
                    </div>
                    <div class="flex flex-row gap-1 items-center">
                        <span class="font-semibold text-slate-200">{{ $review->user->fullname }}</span>
                        <span class="font-bold uppercase {{
                            ($review->user->role === 'admin') ? 'text-purple-400' :
                            (($review->user->role === 'pustakawan') ? 'text-yellow-400' :
                            (($review->user->role === 'penulis') ? 'text-red-400' : 'text-sky-400'))
                        }}">{{ $review->user->role }}</span>
                    </div>
                </a>
                <div class="flex items-center">
                    <span class="text-xs">{{ $review->created_at }}</span>
                </div>
            </div>
            <div>
                <p class="text-sm">{{ $review->review }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

