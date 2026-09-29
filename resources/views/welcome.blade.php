<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi NU Desa Pandansari</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar Wrapper (Fixed di paling atas) -->
    <div id="navbar-wrapper" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 pt-4 px-4 sm:px-6 lg:px-8">
        <nav id="main-nav" class="bg-emerald-800 text-emerald-100 max-w-7xl mx-auto rounded-full shadow-lg px-6 lg:px-8 transition-all duration-300 relative">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo & Judul Kiri -->
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

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1 font-semibold text-sm">
                    <a href="{{ url('/') }}" class="desktop-nav-link px-5 py-2 rounded-full bg-emerald-900 shadow-sm text-yellow-400 transition">Beranda</a>
                    <a href="{{ url('/#berita') }}" class="desktop-nav-link px-5 py-2 rounded-full hover:text-yellow-300 transition">Berita</a>
                    <a href="{{ url('/#galeri') }}" class="desktop-nav-link px-5 py-2 rounded-full hover:text-yellow-300 transition">Galeri</a>
                    <a href="{{ route('struktur.index') }}" class="desktop-nav-link px-5 py-2 rounded-full hover:text-yellow-300 transition">Struktur Organisasi</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-btn" class="text-yellow-400 hover:text-white focus:outline-none p-2 rounded-full bg-emerald-900 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 right-0 mt-3 bg-emerald-900 rounded-2xl shadow-lg p-3 flex flex-col gap-1">
                <a href="{{ url('/') }}" class="mobile-link mobile-nav-link px-4 py-3 bg-emerald-800 text-yellow-400 rounded-xl font-bold transition">Beranda</a>
                <a href="{{ url('/#berita') }}" class="mobile-link mobile-nav-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Berita</a>
                <a href="{{ url('/#galeri') }}" class="mobile-link mobile-nav-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Galeri</a>
                <a href="{{ route('struktur.index') }}" class="mobile-link mobile-nav-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Struktur Organisasi</a>
            </div>
        </nav>
    </div>

    <!-- Banner (Dipindah ke bawah Navbar dengan jarak pt-28 agar tampil rapi di bawah navbar melayang) -->
    <div class="bg-emerald-700 text-yellow-300 text-center pt-28 pb-16 px-4 md:pt-36 md:pb-20 shadow-inner">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-4 text-yellow-400 leading-tight">Nahdlatul Ulama Pandansari</h1>
        <p class="text-base sm:text-lg md:text-xl max-w-2xl mx-auto opacity-90 text-yellow-100">
            Pusat informasi, dakwah, dan kegiatan warga Nahdlatul Ulama tingkat ranting.
        </p>
    </div>

    <!-- Berita -->
    <div id="berita" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <h2 class="text-xl sm:text-2xl font-bold mb-6 md:mb-8 text-gray-900">Berita & Informasi Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($beritas as $item)
                <div class="bg-white border border-black rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 transition transform duration-200 flex flex-col overflow-hidden">
                    <div class="p-5 md:p-6 flex-1">
                        <span class="text-xs font-bold inline-block py-1 px-2 uppercase rounded text-emerald-900 bg-emerald-100 mb-3 border border-black">
                            {{ $item->kategori }}
                        </span>
                        <h3 class="text-lg md:text-xl font-bold mb-2 text-black leading-snug">{{ $item->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3 font-medium">{{ Str::limit($item->konten, 120) }}</p>
                    </div>
                    <div class="px-5 md:px-6 py-4 bg-gray-50 text-xs text-gray-500 font-medium border-t border-black">
                        Dipublikasikan: {{ $item->created_at->format('d M Y') }}
                    </div>
                </div>
            @empty
                <p class="text-gray-500 italic">Belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>
    </div>

    <!-- Galeri Kegiatan -->
    <div id="galeri" class="bg-emerald-50 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl sm:text-2xl font-bold mb-6 md:mb-8 text-gray-900">Galeri Kegiatan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($galeris as $foto)
                    <div class="bg-white border border-black rounded-lg shadow-sm hover:shadow-md transition flex flex-col overflow-hidden group">
                        <div class="aspect-video bg-gray-200 overflow-hidden relative border-b border-black">
                            <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-emerald-900 text-sm mb-2">{{ $foto->judul }}</h3>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Belum ada foto galeri.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer Minimalis -->
    <footer class="bg-emerald-900 border-t border-black text-emerald-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-6 text-center md:text-left">
                <div>
                    <h2 class="text-xl font-extrabold text-yellow-400 mb-2 flex items-center justify-center md:justify-start gap-2">
                        <span>NU Pandansari</span>
                    </h2>
                    <p class="text-sm opacity-90 max-w-sm mx-auto md:mx-0">
                        Pusat informasi dan dokumentasi kegiatan warga Nahdlatul Ulama tingkat ranting Desa Pandansari.
                    </p>
                </div>
                <div class="text-sm">
                    <p class="font-bold text-yellow-300 mb-1">Sekretariat Ranting</p>
                    <p>Jl. Nama Jalan Desa No. 12, Pandansari</p>
                    <a href="#" class="inline-block mt-3 bg-yellow-500 text-emerald-900 font-bold px-4 py-1.5 rounded border border-black shadow hover:bg-yellow-400 transition text-xs">
                        Hubungi Pengurus
                    </a>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-emerald-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs">
                <p class="text-emerald-300">
                    &copy; 2026 PRNU Pandansari. All rights reserved.
                </p>
                <a href="{{ route('login') }}" class="text-emerald-400 hover:text-yellow-300 transition font-medium">
                    Login Pengurus &rarr;
                </a>
            </div>
        </div>
    </footer>

    <!-- Script Navbar & Scroll -->
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
            
            if (window.scrollY > 10) {
                wrapper.className = 'fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-emerald-800 shadow-md';
                nav.className = 'text-emerald-100 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 transition-all duration-300 relative';
            } else {
                wrapper.className = 'fixed top-0 left-0 w-full z-50 transition-all duration-300 pt-4 px-4 sm:px-6 lg:px-8';
                nav.className = 'bg-emerald-800 text-emerald-100 max-w-7xl mx-auto rounded-full shadow-lg px-6 lg:px-8 transition-all duration-300 relative';
            }
        });

        // Scrollspy untuk navbar
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('div#berita, div#galeri');
            const desktopLinks = document.querySelectorAll('.desktop-nav-link');
            const mobileLinks = document.querySelectorAll('.mobile-nav-link');

            const activeDesktopClasses = ['bg-emerald-900', 'shadow-sm', 'text-yellow-400'];
            const inactiveDesktopClasses = ['hover:text-yellow-300'];
            
            const activeMobileClasses = ['bg-emerald-800', 'text-yellow-400'];
            const inactiveMobileClasses = ['text-emerald-100', 'hover:bg-emerald-800'];

            function updateNav() {
                let currentSectionId = 'beranda';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    // Deteksi jika scroll sudah mencapai area section (150px offset dari atas)
                    if (window.scrollY >= sectionTop - 150) {
                        currentSectionId = section.getAttribute('id');
                    }
                });

                desktopLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (!href.includes('#') && href !== "{{ url('/') }}") return; // Abaikan link external

                    let isMatch = false;
                    if (currentSectionId === 'beranda' && href === "{{ url('/') }}") {
                        isMatch = true;
                    } else if (currentSectionId !== 'beranda' && href.includes('#' + currentSectionId)) {
                        isMatch = true;
                    }

                    if (isMatch) {
                        link.classList.remove(...inactiveDesktopClasses);
                        link.classList.add(...activeDesktopClasses);
                    } else {
                        link.classList.remove(...activeDesktopClasses);
                        link.classList.add(...inactiveDesktopClasses);
                    }
                });

                mobileLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (!href.includes('#') && href !== "{{ url('/') }}") return; // Abaikan link external

                    let isMatch = false;
                    if (currentSectionId === 'beranda' && href === "{{ url('/') }}") {
                        isMatch = true;
                    } else if (currentSectionId !== 'beranda' && href.includes('#' + currentSectionId)) {
                        isMatch = true;
                    }

                    if (isMatch) {
                        link.classList.remove(...inactiveMobileClasses);
                        link.classList.add(...activeMobileClasses);
                    } else {
                        link.classList.remove(...activeMobileClasses);
                        link.classList.add(...inactiveMobileClasses);
                    }
                });
            }

            window.addEventListener('scroll', updateNav);
            updateNav(); // Panggil sekali saat load
        });
    </script>
</body>
</html>