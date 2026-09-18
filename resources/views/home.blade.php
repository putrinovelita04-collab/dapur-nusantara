@extends('layouts.app')

@section('title', 'Dapur Nusantara — Catering Terpercaya untuk Setiap Momen Spesial')

@section('content')

    {{-- HERO BANNER (Section utama, tampil penuh sebelum di-scroll) --}}
    <section class="relative min-h-[85vh] flex items-center bg-dn-dark text-dn-white overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center opacity-30"
             style="background-image: url('https://images.unsplash.com/photo-1600335895229-6e75511892c8?q=80&w=1920');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-dn-dark via-dn-dark/70 to-dn-dark/40"></div>

        <div class="relative z-10 max-w-4xl mx-auto text-center px-6">
            <p class="uppercase tracking-widest text-dn-brown font-semibold mb-4 text-sm">Dapur Nusantara Catering</p>
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                Catering Terpercaya untuk<br class="hidden md:block"> Setiap Momen Spesial
            </h1>
            <p class="text-lg text-gray-200 mb-10 max-w-2xl mx-auto">
                Hadirkan cita rasa autentik nusantara di acara pernikahan, ulang tahun, kantor,
                hingga acara keluarga Anda — higienis, tepat waktu, dan harga bersahabat.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('menu.index') }}"
                   class="px-8 py-3 rounded-full bg-dn-brown hover:bg-dn-white hover:text-dn-dark transition font-semibold">
                    Lihat Menu
                </a>
                <a href="{{ route('kontak') }}"
                   class="px-8 py-3 rounded-full border border-dn-white hover:bg-dn-white hover:text-dn-dark transition font-semibold">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </section>

            {{-- KEUNGGULAN --}}
    <section class="py-20 bg-dn-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-14 text-dn-dark">Kenapa Pilih Dapur Nusantara?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    [
                        'title' => 'Higienis Terjamin',
                        'desc' => 'Diproses dengan standar kebersihan tinggi.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12c0 4.556-3.03 8.25-6.75 9.75L12 21l-2.25.75C6.03 20.25 3 16.556 3 12V7.5a2.25 2.25 0 011.5-2.121L12 3l7.5 2.379A2.25 2.25 0 0121 7.5V12z" />',
                    ],
                    [
                        'title' => 'Tepat Waktu',
                        'desc' => 'Pesanan diantar sesuai jadwal acara Anda.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6l4 2M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
                    ],
                    [
                        'title' => 'Harga Terjangkau',
                        'desc' => 'Paket fleksibel untuk berbagai budget.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3M3.75 4.5h16.5a1.5 1.5 0 011.5 1.5v12a1.5 1.5 0 01-1.5 1.5H3.75a1.5 1.5 0 01-1.5-1.5V6a1.5 1.5 0 011.5-1.5z" />',
                    ],
                    [
                        'title' => 'Cita Rasa Autentik',
                        'desc' => 'Resep khas nusantara turun-temurun.',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18.75h12M8.25 18.75v-4.5m7.5 4.5v-4.5M6.31 9.75a3.75 3.75 0 016.917-2.153A3.373 3.373 0 0112.75 7.5a3.75 3.75 0 013.712 4.286 3 3 0 01.038 5.964V18h-9v-.256a3 3 0 01-.19-5.99 3.75 3.75 0 01-.001-2.004z" />',
                    ],
                ] as $item)
                    <div class="p-6 rounded-2xl border border-dn-brown/20 text-center hover:shadow-lg transition">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-dn-brown/10 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 h-7 text-dn-brown">
                                {!! $item['icon'] !!}
                            </svg>
                        </div>
                        <h3 class="font-semibold text-dn-dark mb-2">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

        {{-- PAKET POPULER --}}
    <section class="py-20 bg-dn-brown/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-dn-dark">Paket Populer</h2>
                <a href="{{ route('menu.index') }}" class="text-dn-brown font-semibold hover:underline">Lihat Semua Menu &rarr;</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($featuredMenus as $menu)
                    <a href="{{ route('menu.show', $menu->slug) }}" class="group rounded-2xl overflow-hidden bg-dn-white border border-dn-brown/10 shadow-sm hover:shadow-xl transition">
                        <div class="h-48 bg-dn-brown/10 overflow-hidden">
                            @if($menu->image)
                                <img src="{{ str_starts_with($menu->image, 'http') ? $menu->image : asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                            @endif
                        </div>
                        <div class="p-5">
                            <h3 class="font-semibold text-dn-dark mb-1">{{ $menu->name }}</h3>
                            <p class="text-dn-brown font-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @empty
                    <p class="col-span-4 text-center text-gray-500">Belum ada paket populer yang ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </section>
    
    {{-- TESTIMONI SINGKAT --}}
    <section class="py-20 bg-dn-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-3xl font-bold text-dn-dark">Apa Kata Pelanggan Kami</h2>
                <a href="{{ route('testimoni') }}" class="text-dn-brown font-semibold hover:underline">Lihat Semua &rarr;</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($testimonials as $t)
                    <div class="p-6 rounded-2xl bg-dn-brown/5 border border-dn-brown/10">
                        <div class="flex items-center gap-3 mb-4">
                            @if($t->photo)
                                <img src="{{ asset('storage/' . $t->photo) }}" class="w-12 h-12 rounded-full object-cover" alt="{{ $t->customer_name }}">
                            @else
                                <div class="w-12 h-12 rounded-full bg-dn-brown/30"></div>
                            @endif
                            <div>
                                <p class="font-semibold text-dn-dark">{{ $t->customer_name }}</p>
                                <p class="text-xs text-dn-brown">{{ str_repeat('★', $t->rating) }}</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $t->message }}</p>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Belum ada testimoni.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CTA PEMESANAN --}}
    <section class="py-20 bg-dn-dark text-dn-white text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-4">Siap Memesan Catering untuk Acara Anda?</h2>
            <p class="text-gray-300 mb-8">Hubungi kami sekarang untuk konsultasi paket dan menu sesuai kebutuhan acara Anda.</p>
            <a href="{{ route('kontak') }}" class="inline-block px-8 py-3 rounded-full bg-dn-brown hover:bg-dn-white hover:text-dn-dark transition font-semibold">
                Pesan Sekarang via Website
            </a>
        </div>
    </section>

@endsection
