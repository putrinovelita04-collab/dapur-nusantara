@extends('layouts.app')

@section('title', 'Tentang Kami — Dapur Nusantara')

@section('content')

<section class="py-16 bg-dn-dark text-dn-white text-center">
    <h1 class="text-4xl font-bold mb-3">Tentang Dapur Nusantara</h1>
    <p class="text-gray-300 max-w-2xl mx-auto">Perjalanan kami menghadirkan cita rasa autentik nusantara ke setiap acara Anda</p>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
        <div class="h-80 rounded-2xl overflow-hidden bg-dn-brown/10">
            <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1200"
                 alt="Dapur Nusantara" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-2xl font-bold text-dn-dark mb-4">Sejarah Kami</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                Dapur Nusantara lahir dari kecintaan pada masakan tradisional Indonesia. Bermula dari
                usaha rumahan kecil, kami tumbuh menjadi mitra terpercaya untuk berbagai acara —
                mulai dari pernikahan, syukuran, ulang tahun, hingga kebutuhan konsumsi kantor.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Setiap hidangan kami masak dengan resep turun-temurun, bahan segar pilihan, dan
                standar kebersihan yang ketat, agar cita rasa nusantara tetap autentik di setiap
                momen spesial pelanggan kami.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-20">
        <div class="p-8 rounded-2xl bg-dn-brown/5 border border-dn-brown/10">
            <h3 class="text-xl font-bold text-dn-dark mb-3">Visi</h3>
            <p class="text-gray-600 leading-relaxed">
                Menjadi penyedia jasa catering nusantara paling terpercaya yang menghadirkan
                kelezatan dan kepuasan di setiap acara masyarakat Indonesia.
            </p>
        </div>
        <div class="p-8 rounded-2xl bg-dn-brown/5 border border-dn-brown/10">
            <h3 class="text-xl font-bold text-dn-dark mb-3">Misi</h3>
            <ul class="text-gray-600 leading-relaxed list-disc list-inside space-y-1">
                <li>Menyajikan makanan berkualitas dengan bahan segar dan higienis</li>
                <li>Memberikan pelayanan tepat waktu dan profesional</li>
                <li>Menjaga cita rasa autentik nusantara di setiap menu</li>
                <li>Menawarkan harga yang bersahabat untuk semua kalangan</li>
            </ul>
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold text-dn-dark mb-8 text-center">Galeri Dapur Kami</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([
                'https://images.unsplash.com/photo-1556909212-d5b604d0c90d?q=80&w=600',
                'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=600',
                'https://images.unsplash.com/photo-1600891964092-4316c288032e?q=80&w=600',
                'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=600',
            ] as $img)
                <div class="h-40 rounded-xl overflow-hidden bg-dn-brown/10">
                    <img src="{{ $img }}" alt="Galeri Dapur Nusantara" class="w-full h-full object-cover">
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
