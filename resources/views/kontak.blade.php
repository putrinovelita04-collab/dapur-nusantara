@extends('layouts.app')

@section('title', 'Kontak & Pemesanan — Dapur Nusantara')

@section('content')

<section class="py-16 bg-dn-dark text-dn-white text-center">
    <h1 class="text-4xl font-bold mb-3">Kontak & Pemesanan</h1>
    <p class="text-gray-300">Isi form di bawah untuk memesan catering, atau hubungi kami langsung</p>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

        {{-- Info Kontak --}}
        <div class="lg:col-span-2 space-y-8">
            <div>
                <h2 class="text-xl font-bold text-dn-dark mb-2">Informasi Kontak</h2>
                <p class="text-gray-600 text-sm">Hubungi kami melalui salah satu kontak berikut.</p>
            </div>

            <div class="space-y-4 text-sm">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-dn-brown/10 flex items-center justify-center shrink-0">
                        <div class="w-3 h-3 rounded-full bg-dn-brown"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-dn-dark">Alamat</p>
                        <p class="text-gray-600">{{ \App\Models\Setting::get('alamat', 'Jl. Nusantara No. 1, Indonesia') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-dn-brown/10 flex items-center justify-center shrink-0">
                        <div class="w-3 h-3 rounded-full bg-dn-brown"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-dn-dark">WhatsApp</p>
                        <p class="text-gray-600">{{ \App\Models\Setting::get('no_wa', '0812-3456-7890') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-dn-brown/10 flex items-center justify-center shrink-0">
                        <div class="w-3 h-3 rounded-full bg-dn-brown"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-dn-dark">Email</p>
                        <p class="text-gray-600">{{ \App\Models\Setting::get('email', 'info@dapurnusantara.com') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full bg-dn-brown/10 flex items-center justify-center shrink-0">
                        <div class="w-3 h-3 rounded-full bg-dn-brown"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-dn-dark">Jam Operasional</p>
                        <p class="text-gray-600">{{ \App\Models\Setting::get('jam_operasional', 'Senin - Sabtu, 08.00 - 20.00 WIB') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Pemesanan --}}
        <div class="lg:col-span-3">
            <div class="p-8 rounded-2xl border border-dn-brown/10 shadow-sm">
                <h2 class="text-xl font-bold text-dn-dark mb-6">Form Pemesanan Catering</h2>

                @if(session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-700 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('kontak.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-dn-dark mb-1">Nama Lengkap</label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">
                            @error('customer_name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dn-dark mb-1">Nomor WhatsApp</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">
                            @error('phone') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dn-dark mb-1">Email (opsional)</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">
                        @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-dn-dark mb-1">Pilih Paket Menu</label>
                            <select name="menu_id" class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">
                                <option value="">-- Pilih Menu --</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ (string) request('menu') === (string) $menu->id ? 'selected' : '' }}>
                                        {{ $menu->name }} — Rp {{ number_format($menu->price, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('menu_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dn-dark mb-1">Jumlah Porsi</label>
                            <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}"
                                   class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">
                            @error('quantity') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dn-dark mb-1">Tanggal Acara</label>
                        <input type="date" name="event_date" value="{{ old('event_date') }}"
                               class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">
                        @error('event_date') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dn-dark mb-1">Alamat Acara</label>
                        <textarea name="event_address" rows="3"
                                  class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">{{ old('event_address') }}</textarea>
                        @error('event_address') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dn-dark mb-1">Catatan Tambahan (opsional)</label>
                        <textarea name="notes" rows="2"
                                  class="w-full rounded-lg border-gray-300 focus:border-dn-brown focus:ring-dn-brown text-sm">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit"
                            class="w-full py-3 rounded-full bg-dn-brown text-dn-white font-semibold hover:bg-dn-dark transition">
                        Kirim Pesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
