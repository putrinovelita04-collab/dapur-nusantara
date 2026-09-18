@extends('layouts.app')

@section('title', $menu->name . ' — Dapur Nusantara')
@section('meta_description', Str::limit(strip_tags($menu->description), 155))

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        {{-- Gambar --}}
        <div>
            <div class="h-96 rounded-2xl overflow-hidden bg-dn-brown/10">
                @if($menu->image)
                    <img src="{{ str_starts_with($menu->image, 'http') ? $menu->image : asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
                @endif
            </div>
            @if($menu->images->count())
                <div class="grid grid-cols-4 gap-3 mt-3">
                    @foreach($menu->images as $img)
                        <div class="h-20 rounded-lg overflow-hidden bg-dn-brown/10">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover" alt="Galeri {{ $menu->name }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Detail --}}
        <div>
            <p class="text-xs text-dn-brown font-semibold uppercase mb-2">{{ $menu->category->name }}</p>
            <h1 class="text-3xl font-bold text-dn-dark mb-4">{{ $menu->name }}</h1>
            <p class="text-2xl font-bold text-dn-brown mb-2">Rp {{ number_format($menu->price, 0, ',', '.') }} <span class="text-sm text-gray-500 font-normal">/ porsi</span></p>
            <p class="text-sm text-gray-500 mb-6">Minimal pemesanan {{ $menu->min_order }} porsi</p>

            <p class="text-gray-600 leading-relaxed mb-8">{{ $menu->description }}</p>

            <a href="{{ route('kontak') }}?menu={{ $menu->id }}"
               class="inline-block px-8 py-3 rounded-full bg-dn-brown text-dn-white hover:bg-dn-dark transition font-semibold">
                Pesan Menu Ini
            </a>
        </div>
    </div>

    {{-- Menu Terkait --}}
    @if($related->count())
        <div class="mt-20">
            <h2 class="text-2xl font-bold text-dn-dark mb-8">Menu Terkait Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                @foreach($related as $r)
                    <a href="{{ route('menu.show', $r->slug) }}" class="group rounded-2xl overflow-hidden bg-dn-white border border-dn-brown/10 shadow-sm hover:shadow-xl transition">
                        <div class="h-40 bg-dn-brown/10 overflow-hidden">
                            @if($r->image)
                                <img src="{{ asset('storage/' . $r->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition" alt="{{ $r->name }}">
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-dn-dark mb-1">{{ $r->name }}</h3>
                            <p class="text-dn-brown font-bold text-sm">Rp {{ number_format($r->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection