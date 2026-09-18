@extends('layouts.app')

@section('title', 'Menu & Paket Catering — Dapur Nusantara')

@section('content')
<section class="py-16 bg-dn-dark text-dn-white text-center">
    <h1 class="text-4xl font-bold mb-3">Menu & Paket Catering</h1>
    <p class="text-gray-300">Pilih paket sesuai kebutuhan acara Anda</p>
</section>

<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    {{-- Filter Kategori --}}
    <div class="flex flex-wrap gap-3 justify-center mb-12">
        <a href="{{ route('menu.index') }}"
           class="px-5 py-2 rounded-full text-sm font-medium border {{ !request('category') ? 'bg-dn-brown text-dn-white border-dn-brown' : 'border-dn-brown/30 text-dn-dark' }}">
            Semua
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('menu.index', ['category' => $cat->id]) }}"
               class="px-5 py-2 rounded-full text-sm font-medium border {{ request('category') == $cat->id ? 'bg-dn-brown text-dn-white border-dn-brown' : 'border-dn-brown/30 text-dn-dark' }}">
                {{ $cat->name }} ({{ $cat->menus_count }})
            </a>
        @endforeach
    </div>

    {{-- Grid Menu --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($menus as $menu)
            <a href="{{ route('menu.show', $menu->slug) }}" class="group rounded-2xl overflow-hidden bg-dn-white border border-dn-brown/10 shadow-sm hover:shadow-xl transition">
                <div class="h-52 bg-dn-brown/10 overflow-hidden">
                    @if($menu->image)
                        <img src="{{ str_starts_with($menu->image, 'http') ? $menu->image : asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover group-hover:scale-105 transition">
                    @endif
                </div>
                <div class="p-5">
                    <p class="text-xs text-dn-brown font-semibold mb-1 uppercase">{{ $menu->category->name }}</p>
                    <h3 class="font-semibold text-dn-dark mb-2">{{ $menu->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">Min. {{ $menu->min_order }} porsi</p>
                    <p class="text-dn-brown font-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                </div>
            </a>
        @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada menu tersedia pada kategori ini.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $menus->links() }}
    </div>
</section>
@endsection