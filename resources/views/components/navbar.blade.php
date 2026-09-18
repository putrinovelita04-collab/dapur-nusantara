<header class="bg-dn-dark text-dn-white sticky top-0 z-40 shadow-md" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-wide">
                Dapur <span class="text-dn-brown font-light">Nusantara</span>
            </a>

            {{-- Desktop Menu --}}
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}"
                   class="hover:text-dn-brown transition {{ request()->routeIs('home') ? 'text-dn-brown' : '' }}">Beranda</a>
                <a href="{{ route('menu.index') }}"
                   class="hover:text-dn-brown transition {{ request()->routeIs('menu.*') ? 'text-dn-brown' : '' }}">Menu</a>
                <a href="{{ route('tentang') }}"
                   class="hover:text-dn-brown transition {{ request()->routeIs('tentang') ? 'text-dn-brown' : '' }}">Tentang Kami</a>
                <a href="{{ route('testimoni') }}"
                   class="hover:text-dn-brown transition {{ request()->routeIs('testimoni') ? 'text-dn-brown' : '' }}">Testimoni</a>
                <a href="{{ route('kontak') }}"
                   class="px-5 py-2 rounded-full bg-dn-brown hover:bg-dn-white hover:text-dn-dark transition">Pesan Sekarang</a>
            </nav>

            {{-- Mobile Hamburger --}}
            <button @click="open = !open" class="md:hidden text-dn-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-cloak class="md:hidden pb-6 flex flex-col gap-4 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-dn-brown">Beranda</a>
            <a href="{{ route('menu.index') }}" class="hover:text-dn-brown">Menu</a>
            <a href="{{ route('tentang') }}" class="hover:text-dn-brown">Tentang Kami</a>
            <a href="{{ route('testimoni') }}" class="hover:text-dn-brown">Testimoni</a>
            <a href="{{ route('kontak') }}" class="px-5 py-2 rounded-full bg-dn-brown text-center">Pesan Sekarang</a>
        </div>
    </div>
</header>
