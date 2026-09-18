<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dapur Nusantara — Catering Terpercaya')</title>
    <meta name="description" content="@yield('meta_description', 'Dapur Nusantara menyediakan layanan catering untuk berbagai acara: pernikahan, ulang tahun, kantor, dan lainnya.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dn-white text-dn-dark antialiased">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/{{ \App\Models\Setting::get('no_wa', '6281234567890') }}"
       target="_blank"
       class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 rounded-full bg-green-500 text-white shadow-lg hover:bg-green-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.48 1.32 4.99L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.86 9.86 0 0 0 12.04 2z"/>
        </svg>
    </a>

    @stack('scripts')
</body>
</html>
