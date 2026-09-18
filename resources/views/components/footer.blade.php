<footer class="bg-dn-dark text-dn-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-10">

        <div>
            <h3 class="text-xl font-bold mb-3">Dapur <span class="text-dn-brown">Nusantara</span></h3>
            <p class="text-sm text-gray-300 leading-relaxed">
                Menyajikan cita rasa autentik nusantara untuk setiap momen spesial Anda.
            </p>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Menu</h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li><a href="{{ route('home') }}" class="hover:text-dn-brown">Beranda</a></li>
                <li><a href="{{ route('menu.index') }}" class="hover:text-dn-brown">Paket Catering</a></li>
                <li><a href="{{ route('tentang') }}" class="hover:text-dn-brown">Tentang Kami</a></li>
                <li><a href="{{ route('testimoni') }}" class="hover:text-dn-brown">Testimoni</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:text-dn-brown">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Kontak</h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>{{ \App\Models\Setting::get('alamat', 'Jl. Nusantara No. 1, Indonesia') }}</li>
                <li>WhatsApp: {{ \App\Models\Setting::get('no_wa', '0812-3456-7890') }}</li>
                <li>{{ \App\Models\Setting::get('email', 'info@dapurnusantara.com') }}</li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Jam Operasional</h4>
            <p class="text-sm text-gray-300">
                {{ \App\Models\Setting::get('jam_operasional', 'Senin - Sabtu, 08.00 - 20.00 WIB') }}
            </p>
        </div>
    </div>

    <div class="mt-12 border-t border-dn-brown/40 pt-6 text-center text-xs text-gray-400">
        &copy; {{ date('Y') }} Dapur Nusantara. Seluruh hak cipta dilindungi.
    </div>
</footer>
