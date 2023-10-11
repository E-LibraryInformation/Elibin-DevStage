<div class="bg-slate-800 w-full h-14 flex justify-between items-center">
    <div class="flex flex-row text-white text-2xl p-12">
        <span class="font-medium">Elibin</span>
    </div>
    <ul class="hidden lg:flex flex-row p-12 text-slate-300 gap-8">
        <li>
            <a href="/" class="{{ ($active === 'dashboard') ? 'border-b border-slate-300' : '' }}">Home</a>
        </li>
        <li>
            <a href="/books" class="{{ ($active === 'books') ? 'border-b border-slate-300' : '' }}">Books</a>
        </li>
        <li>
            <a href="/writers" class="{{ ($active === 'penulis') ? 'border-b border-slate-300' : '' }}">Writers</a>
        </li>
        <li>
            <a href="/perpustakaan" class="{{ $active === 'perpustakaan' ? 'border-b border-slate-300' : '' }}">Library</a>
        </li>
    </ul>
    <ul class="hidden lg:block">
        @guest
        <li>
            <a href="/login" class="text-slate-300"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
        </li>
        @endguest

        @auth
        <li class="flex flex-col">
            <button class="flex flex-row items-center gap-2" onclick="toggleDownUser()">
                <img src="{{ asset(Auth::user()->gambar) }}" alt="{{ Auth::user()->username }}" class="w-8 h-7 rounded-full">
                <div>
                    <span class="text-slate-200">{{ Auth::user()->username }} |</span>
                    @switch(Auth::user()->role)
                        @case('pembaca')
                            <span class="text-sky-400 uppercase font-medium">{{ Auth::user()->role }}</span>
                            @break
                        @case('penulis')
                            <span class="text-red-400 uppercase font-medium">{{ Auth::user()->role }}</span>
                            @break
                        @case('pustakawan')
                            <span class="text-yellow-400 uppercase font-medium">{{ Auth::user()->role }}</span>
                            @break
                        @case('admin')
                            <span class="text-purple-400 uppercase font-medium">{{ Auth::user()->role }}</span>
                            @break
                        @default
                            <span>{{ Auth::user()->role }}</span>
                    @endswitch
                </div>
            </button>
            <ul id="downUser" class="bg-slate-600 w-48 h-max border rounded-lg fixed top-14 text-white flex-col gap-1 p-2 z-10 hidden">
                <li>
                    <a href="/account"><i class="w-4 fa-solid fa-user"></i> Profile</a>
                </li>
                <li>
                    @if (Auth::user()->role === 'pustakawan' || Auth::user()->role === 'admin')
                        <a href="/dashboard"><i class="w-4 fa-solid fa-table-columns"></i> Dashboard</a>
                    @endif
                </li>
                <li>
                    <a href="/upgrade" class="text-yellow-400"><i class="w-4 fa-solid fa-gem"></i> Upgrade Account</a>
                </li>
                <li>
                    <a href="/logout" class="text-red-400"><i class="w-4 fa-solid fa-right-from-bracket"></i> Logout</a>
                </li>
            </ul>
        </li>
        @endauth
    </ul>
    <div class="p-8">
        <button class="text-2xl text-white lg:hidden"><i class="fa-solid fa-bars"></i></button>
    </div>
</div>
