<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota {{ $organisasi }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <div id="navbar-wrapper" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 pt-4 px-4 sm:px-6 lg:px-8">
        <nav id="main-nav" class="bg-emerald-800 text-emerald-100 max-w-7xl mx-auto rounded-full shadow-lg px-6 lg:px-8 transition-all duration-300 relative">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-3">
                        <img src="{{ asset('storage/logoNU.jpg') }}" alt="Logo NU" class="h-9 w-9 object-contain rounded-full bg-white">
                        <div class="h-8 w-px bg-emerald-600"></div>
                        <div class="flex flex-col justify-center">
                            <span class="font-extrabold text-lg text-yellow-400 leading-none tracking-tight">NU DESA</span>
                            <span class="text-xs text-emerald-200 font-medium mt-0.5">Pandansari</span>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-1 font-semibold text-sm">
                    <a href="{{ url('/') }}" class="px-5 py-2 rounded-full hover:text-yellow-300 transition">Beranda</a>
                    <a href="{{ url('/#berita') }}" class="px-5 py-2 rounded-full hover:text-yellow-300 transition">Berita</a>
                    <a href="{{ url('/#galeri') }}" class="px-5 py-2 rounded-full hover:text-yellow-300 transition">Galeri</a>
                    <!-- Menu Aktif -->
                    <a href="{{ route('struktur.index') }}" class="px-5 py-2 rounded-full bg-emerald-900 shadow-sm text-yellow-400 transition">Struktur Organisasi</a>
                </div>

                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-btn" class="text-yellow-400 hover:text-white focus:outline-none p-2 rounded-full bg-emerald-900 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 right-0 mt-3 bg-emerald-900 rounded-2xl shadow-lg p-3 flex flex-col gap-1">
                <a href="{{ url('/') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Beranda</a>
                <a href="{{ url('/#berita') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Berita</a>
                <a href="{{ url('/#galeri') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Galeri</a>
                <a href="{{ route('struktur.index') }}" class="mobile-link px-4 py-3 bg-emerald-800 text-yellow-400 rounded-xl font-bold">Struktur Organisasi</a>
            </div>
        </nav>
    </div>

    <div class="flex-grow max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-12 w-full">
        <div class="mb-8 border-b border-black pb-4 flex justify-between items-end">
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-emerald-900 uppercase">Daftar Anggota {{ $organisasi }}</h1>
                <p class="text-gray-600 font-medium mt-1">Ranting Desa Pandansari</p>
            </div>
            <a href="{{ route('struktur.index') }}" class="bg-yellow-400 text-emerald-900 font-bold px-4 py-2 rounded border border-black shadow-sm hover:bg-yellow-500 transition text-sm">
                &larr; Kembali
            </a>
        </div>

        <div class="bg-white border border-black rounded-lg shadow-sm overflow-hidden">
            @if(count($anggotas) > 0)
                <ul class="divide-y divide-black">
                    @foreach($anggotas as $index => $anggota)
                        <li class="p-4 hover:bg-emerald-50 transition flex items-center gap-4">
                            <span class="bg-emerald-100 text-emerald-800 font-bold border border-black rounded-full h-8 w-8 flex items-center justify-center text-sm">
                                {{ $index + 1 }}
                            </span>
                            <div>
                                <p class="text-gray-900 font-bold text-lg">{{ $anggota->nama }}</p>
                                <p class="text-emerald-700 text-sm font-medium">{{ $anggota->jabatan }}</p>
                            </div>
                        </li>
                    @endforeach
                {{-- </ul> --}}
            @else
                <div class="p-12 text-center text-gray-500 font-medium">
                    Belum ada data anggota untuk {{ $organisasi }}.
                </div>
            @endif
        </div>
    </div>

    <footer class="bg-emerald-900 border-t border-black text-center py-6 text-emerald-300 text-sm font-bold">
        &copy; 2026 PRNU Pandansari. All rights reserved.
    </footer>

    <!-- Script Navbar -->
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconBars = document.getElementById('menu-icon-bars');
        const iconClose = document.getElementById('menu-icon-close');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            iconBars.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        window.addEventListener('scroll', () => {
            const wrapper = document.getElementById('navbar-wrapper');
            const nav = document.getElementById('main-nav');

            if (window.scrollY > 20) {
                wrapper.classList.remove('pt-4', 'px-4', 'sm:px-6', 'lg:px-8');
                wrapper.classList.add('bg-emerald-800', 'shadow-md');
                nav.classList.remove('bg-emerald-800', 'rounded-full', 'shadow-lg');
            } else {
                wrapper.classList.add('pt-4', 'px-4', 'sm:px-6', 'lg:px-8');
                wrapper.classList.remove('bg-emerald-800', 'shadow-md');
                nav.classList.add('bg-emerald-800', 'rounded-full', 'shadow-lg');
            }
        });
    </script>
</body>
</html>
