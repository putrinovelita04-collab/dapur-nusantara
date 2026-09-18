@extends('layouts.app')

@section('title', 'Testimoni Pelanggan — Dapur Nusantara')

@section('content')

<section class="py-16 bg-dn-dark text-dn-white text-center">
    <h1 class="text-4xl font-bold mb-3">Testimoni Pelanggan</h1>
    <p class="text-gray-300">Apa kata mereka yang sudah menggunakan layanan kami</p>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($testimonials as $t)
            <div class="p-6 rounded-2xl bg-dn-brown/5 border border-dn-brown/10">
                <div class="flex items-center gap-3 mb-4">
                    @if($t->photo)
                        <img src="{{ str_starts_with($t->photo, 'http') ? $t->photo : asset('storage/' . $t->photo) }}" class="w-12 h-12 rounded-full object-cover" alt="{{ $t->customer_name }}">
                    @else
                        <div class="w-12 h-12 rounded-full bg-dn-brown/30 flex items-center justify-center text-dn-brown font-bold text-lg">
                            {{ strtoupper(substr($t->customer_name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <p class="font-semibold text-dn-dark">{{ $t->customer_name }}</p>
                        @if($t->occasion)
                            <p class="text-xs text-gray-400">{{ $t->occasion }}</p>
                        @endif
                        <p class="text-xs text-dn-brown">{{ str_repeat('★', $t->rating) }}{{ str_repeat('☆', 5 - $t->rating) }}</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed">{{ $t->message }}</p>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">Belum ada testimoni yang dipublikasikan.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $testimonials->links() }}
    </div>
</section>

<section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 border-t border-dn-brown/10">
    <div class="bg-dn-white rounded-2xl shadow-sm border border-dn-brown/10 p-8">
        <h2 class="text-2xl font-bold text-dn-dark mb-2 text-center">Kirim Testimoni</h2>
        <p class="text-gray-500 text-sm text-center mb-8">Ceritakan pengalaman Anda menggunakan layanan kami</p>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="customer_name" class="block text-sm font-medium text-dn-dark mb-1">Nama Lengkap</label>
                <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}"
                       class="w-full rounded-xl border border-dn-brown/20 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-dn-brown/40 @error('customer_name') border-red-400 @enderror"
                       placeholder="Masukkan nama Anda">
                @error('customer_name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="occasion" class="block text-sm font-medium text-dn-dark mb-1">Jabatan / Acara <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="text" name="occasion" id="occasion" value="{{ old('occasion') }}"
                       class="w-full rounded-xl border border-dn-brown/20 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-dn-brown/40 @error('occasion') border-red-400 @enderror"
                       placeholder="Contoh: Corporate Secretary, PT Telkom / Acara Pernikahan">
                @error('occasion')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-dn-dark mb-1">Rating</label>
                <div class="flex gap-1" id="rating-group">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" data-value="{{ $i }}" class="star-btn text-3xl text-gray-300 transition cursor-pointer hover:text-yellow-400 {{ old('rating', 5) >= $i ? 'text-yellow-400' : '' }}">★</button>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="rating-input" value="{{ old('rating', 5) }}">
                @error('rating')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="message" class="block text-sm font-medium text-dn-dark mb-1">Pesan Testimoni</label>
                <textarea name="message" id="message" rows="4"
                          class="w-full rounded-xl border border-dn-brown/20 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-dn-brown/40 @error('message') border-red-400 @enderror"
                          placeholder="Ceritakan pengalaman Anda...">{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="photo" class="block text-sm font-medium text-dn-dark mb-1">Foto <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="file" name="photo" id="photo" accept="image/*"
                       class="w-full rounded-xl border border-dn-brown/20 px-4 py-2.5 text-sm file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-dn-brown/10 file:text-dn-brown file:font-medium file:text-sm file:cursor-pointer hover:file:bg-dn-brown/20 focus:outline-none focus:ring-2 focus:ring-dn-brown/40 @error('photo') border-red-400 @enderror">
                <p class="mt-1 text-xs text-gray-400">Format: JPG, PNG, WebP. Maks 2MB.</p>
                @error('photo')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full py-3 rounded-xl bg-dn-brown text-dn-white font-semibold hover:bg-dn-dark transition">
                Kirim Testimoni
            </button>
        </form>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star-btn');
        const input = document.getElementById('rating-input');

        function updateStars(value) {
            stars.forEach(function (star) {
                star.classList.toggle('text-yellow-400', star.dataset.value <= value);
                star.classList.toggle('text-gray-300', star.dataset.value > value);
            });
        }

        updateStars(input.value);

        stars.forEach(function (star) {
            star.addEventListener('click', function () {
                input.value = this.dataset.value;
                updateStars(this.dataset.value);
            });

            star.addEventListener('mouseenter', function () {
                updateStars(this.dataset.value);
            });

            star.addEventListener('mouseleave', function () {
                updateStars(input.value);
            });
        });
    });
</script>
@endpush
