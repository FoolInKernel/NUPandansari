<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi NU Desa Pandansari</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
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
                    <a href="{{ route('galeri.public') }}" class="desktop-nav-link px-5 py-2 rounded-full hover:text-yellow-300 transition">Galeri</a>
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
                <a href="{{ route('galeri.public') }}" class="mobile-link mobile-nav-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Galeri</a>
                <a href="{{ route('struktur.index') }}" class="mobile-link mobile-nav-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Struktur Organisasi</a>
            </div>
        </nav>
    </div>

    <!-- Banner -->
    <div class="bg-emerald-800 text-white text-center pt-28 pb-16 px-4 md:pt-36 md:pb-20">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-4 leading-tight">Nahdlatul Ulama Pandansari</h1>
        <p class="text-base sm:text-lg md:text-xl max-w-2xl mx-auto opacity-80">
            Pusat informasi, dakwah, dan kegiatan warga Nahdlatul Ulama tingkat ranting.
        </p>
    </div>

    <!-- Berita -->
    <div id="berita" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="flex items-center justify-between mb-6 md:mb-8">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 flex items-center gap-2">
                <i class="fa-solid fa-newspaper text-emerald-700"></i>
                Berita & Informasi Terbaru
            </h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($beritas as $item)
                <a href="{{ route('berita.detail', $item->slug ?? $item->id) }}" class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition transform duration-200 flex flex-col overflow-hidden">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-5 md:p-6 flex-1">
                        <span class="text-xs font-bold inline-flex items-center gap-1 py-1 px-2.5 rounded-full text-emerald-800 bg-emerald-50 mb-3 border border-emerald-200">
                            <i class="fa-solid fa-tag text-[10px]"></i>
                            {{ $item->kategori }}
                        </span>
                        <h3 class="text-lg md:text-xl font-bold mb-2 text-gray-900 leading-snug">{{ $item->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($item->konten, 120) }}</p>
                    </div>
                    <div class="px-5 md:px-6 py-3 bg-gray-50 text-xs text-gray-500 font-medium border-t border-gray-200 flex items-center gap-1.5">
                        <i class="fa-regular fa-calendar text-[10px]"></i>
                        Dipublikasikan: {{ $item->created_at->format('d M Y') }}
                    </div>
                </a>
            @empty
                <p class="text-gray-500 italic">Belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('berita.public') }}" class="inline-flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white font-bold px-5 py-2.5 rounded-lg text-sm shadow-sm transition">
                <span>Lihat Semua Berita</span>
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>
    </div>

    <!-- Galeri Terbaru Showcase Section -->
    <div id="galeri-showcase" class="bg-gray-100/70 border-y border-gray-200/80 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6 md:mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <i class="fa-solid fa-images text-emerald-700"></i>
                    Galeri & Dokumentasi Terbaru
                </h2>
                <a href="{{ route('galeri.public') }}" class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition">
                    <span>Lihat Semua Galeri</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            @if(isset($galeris) && $galeris->count() > 0)
            <div class="bg-white rounded-3xl border border-gray-200 p-6 md:p-8 shadow-sm">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Kiri: Slider Foto Galeri (3 Foto Terbaru) -->
                    <div class="lg:col-span-7 relative">
                        <div class="relative h-[280px] sm:h-[340px] md:h-[380px] w-full flex items-center justify-center overflow-hidden rounded-2xl bg-gray-900">
                            @foreach ($galeris as $index => $item)
                                <div class="galeri-slide absolute inset-0 transition-all duration-500 transform {{ $index === 0 ? 'opacity-100 scale-100 z-10' : 'opacity-0 scale-95 z-0' }}"
                                     data-index="{{ $index }}">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover rounded-2xl">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-emerald-800 to-emerald-950 text-emerald-200 rounded-2xl">
                                            <i class="fa-solid fa-image text-5xl mb-2 opacity-50"></i>
                                            <span class="text-sm font-medium">Dokumentasi PRNU</span>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent rounded-2xl"></div>
                                </div>
                            @endforeach

                            <!-- Navigation Controls (< & >) -->
                            @if($galeris->count() > 1)
                                <button id="prev-galeri-btn" type="button" class="absolute left-3 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-emerald-900 shadow-md flex items-center justify-center transition hover:scale-105 active:scale-95 focus:outline-none" aria-label="Sebelumnya">
                                    <i class="fa-solid fa-chevron-left text-sm"></i>
                                </button>
                                <button id="next-galeri-btn" type="button" class="absolute right-3 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-emerald-900 shadow-md flex items-center justify-center transition hover:scale-105 active:scale-95 focus:outline-none" aria-label="Selanjutnya">
                                    <i class="fa-solid fa-chevron-right text-sm"></i>
                                </button>
                            @endif
                        </div>

                        <!-- Dots Indicator -->
                        @if($galeris->count() > 1)
                            <div class="flex justify-center items-center gap-2 mt-4">
                                @foreach ($galeris as $index => $item)
                                    <button type="button" data-galeri-target="{{ $index }}" class="galeri-dot h-2 rounded-full transition-all duration-300 {{ $index === 0 ? 'w-8 bg-emerald-700' : 'w-2 bg-gray-300 hover:bg-emerald-400' }}"></button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Kanan: Detail Teks Galeri (Ukuran Teks Sedikit Lebih Kecil) -->
                    <div class="lg:col-span-5 flex flex-col justify-center">
                        @foreach ($galeris as $index => $item)
                            <div class="galeri-content-panel transition-all duration-300 {{ $index === 0 ? 'block' : 'hidden' }}" data-index="{{ $index }}">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="text-xs font-semibold py-1 px-3 rounded-full text-emerald-800 bg-emerald-50 border border-emerald-200 inline-flex items-center gap-1.5">
                                        <i class="fa-solid fa-camera text-[10px]"></i>
                                        Dokumentasi Kegiatan
                                    </span>
                                    <span class="text-xs text-gray-500 flex items-center gap-1">
                                        <i class="fa-regular fa-calendar text-[10px]"></i>
                                        {{ $item->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug mb-3">
                                    {{ $item->judul }}
                                </h3>

                                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed mb-6 line-clamp-4">
                                    {{ $item->deskripsi ?? 'Dokumentasi kegiatan resmi PRNU Desa Pandansari.' }}
                                </p>

                                <div class="flex items-center gap-3">
                                    <a href="{{ route('galeri.public') }}" class="inline-flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white font-semibold px-4 py-2 rounded-lg text-xs sm:text-sm shadow-sm transition">
                                        <span>Lihat Semua Galeri</span>
                                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            @else
                <div class="bg-white rounded-2xl border border-gray-200 p-8 text-center">
                    <p class="text-gray-500 italic text-sm">Belum ada foto galeri yang diunggah.</p>
                </div>
            @endif

            <div class="mt-6 flex justify-end sm:hidden">
                <a href="{{ route('galeri.public') }}" class="inline-flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white font-semibold px-4 py-2 rounded-lg text-xs shadow-sm transition">
                    <span>Lihat Semua Galeri</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-emerald-900 text-emerald-100">
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
                    <a href="#" class="inline-flex items-center gap-1.5 mt-3 bg-yellow-500 text-emerald-900 font-bold px-4 py-1.5 rounded text-xs hover:bg-yellow-400 transition">
                        <i class="fa-solid fa-phone text-[10px]"></i>
                        Hubungi Pengurus
                    </a>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-emerald-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs">
                <p class="text-emerald-300">
                    &copy; 2026 PRNU Pandansari. All rights reserved.
                </p>
                {{-- <a href="{{ route('login') }}" class="text-emerald-400 hover:text-yellow-300 transition font-medium inline-flex items-center gap-1">
                    <i class="fa-solid fa-lock text-[10px]"></i>
                    Login Pengurus &rarr;
                </a> --}}
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

        // Galeri Showcase Slider
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.galeri-slide');
            const panels = document.querySelectorAll('.galeri-content-panel');
            const dots = document.querySelectorAll('.galeri-dot');
            const prevBtn = document.getElementById('prev-galeri-btn');
            const nextBtn = document.getElementById('next-galeri-btn');
            const total = slides.length;
            let current = 0;

            if (total <= 1) return;

            function goToSlide(index) {
                current = (index + total) % total;

                slides.forEach((slide, i) => {
                    if (i === current) {
                        slide.classList.remove('opacity-0', 'scale-95', 'z-0');
                        slide.classList.add('opacity-100', 'scale-100', 'z-10');
                    } else {
                        slide.classList.remove('opacity-100', 'scale-100', 'z-10');
                        slide.classList.add('opacity-0', 'scale-95', 'z-0');
                    }
                });

                panels.forEach((panel, i) => {
                    if (i === current) {
                        panel.classList.remove('hidden');
                        panel.classList.add('block');
                    } else {
                        panel.classList.remove('block');
                        panel.classList.add('hidden');
                    }
                });

                dots.forEach((dot, i) => {
                    if (i === current) {
                        dot.classList.remove('w-2', 'bg-gray-300');
                        dot.classList.add('w-8', 'bg-emerald-700');
                    } else {
                        dot.classList.remove('w-8', 'bg-emerald-700');
                        dot.classList.add('w-2', 'bg-gray-300');
                    }
                });
            }

            if (prevBtn) prevBtn.addEventListener('click', () => goToSlide(current - 1));
            if (nextBtn) nextBtn.addEventListener('click', () => goToSlide(current + 1));

            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => goToSlide(i));
            });
        });

        // Scrollspy untuk navbar
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('div#berita');
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
                    if (window.scrollY >= sectionTop - 150) {
                        currentSectionId = section.getAttribute('id');
                    }
                });

                desktopLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (!href.includes('#') && href !== "{{ url('/') }}") return;

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
                    if (!href.includes('#') && href !== "{{ url('/') }}") return;

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
            updateNav();
        });
    </script>
</body>
</html>
