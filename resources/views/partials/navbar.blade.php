<div class="bg-slate-800 w-full h-14 flex justify-between items-center">
    <div class="flex flex-row text-white text-2xl p-12">
        <span class="font-medium">Elibin</span>
    </div>
    <ul class="hidden lg:flex flex-row p-12 text-slate-300 gap-8">
        <li>
            <a href="/" class="{{ ($active === 'dashboard') ? 'border-b border-slate-300' : '' }}">Dashboard</a>
        </li>
        <li>
            <a href="/books" class="{{ ($active === 'books') ? 'border-b border-slate-300' : '' }}">Books</a>
        </li>
        <li>
            <a href="#">Penulis</a>
        </li>
        <li>
            <a href="#">Perpustakaan</a>
        </li>
    </ul>
    <div class="p-8">
        <button class="text-2xl text-white lg:hidden"><i class="fa-solid fa-bars"></i></button>
    </div>
</div>
