<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - NU Pandansari</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar Wrapper (Fixed) -->
    <div id="navbar-wrapper" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 pt-4 px-4 sm:px-6 lg:px-8">
        <nav id="main-nav" class="bg-emerald-800 text-emerald-100 max-w-7xl mx-auto rounded-full shadow-lg px-6 lg:px-8 transition-all duration-300 relative">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo & Judul Kiri -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-3">
                        <img src="{{ asset('storage/logoNU.jpg') }}" alt="Logo NU" class="h-9 w-9 object-contain rounded-full bg-white">
                        <div class="h-8 w-px bg-emerald-600"></div>
                        <div class="flex flex-col justify-center">
                            <span class="font-extrabold text-lg text-white leading-none tracking-tight">NU DESA</span>
                            <span class="text-xs text-emerald-200 font-medium mt-0.5">Pandansari</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1 font-semibold text-sm">
                    <a href="{{ url('/') }}" class="px-5 py-2 rounded-full hover:bg-emerald-700 text-emerald-100 transition">Beranda</a>
                    <a href="{{ route('berita.public') }}" class="px-5 py-2 rounded-full bg-emerald-900 shadow-sm text-white transition">Berita</a>
                    <a href="{{ route('galeri.public') }}" class="px-5 py-2 rounded-full hover:bg-emerald-700 text-emerald-100 transition">Galeri</a>
                    <a href="{{ route('struktur.index') }}" class="px-5 py-2 rounded-full hover:bg-emerald-700 text-emerald-100 transition">Struktur Organisasi</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-btn" class="text-white hover:text-emerald-200 focus:outline-none p-2 rounded-full bg-emerald-900 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 right-0 mt-3 bg-emerald-900 rounded-2xl shadow-lg p-3 flex flex-col gap-1">
                <a href="{{ url('/') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Beranda</a>
                <a href="{{ route('berita.public') }}" class="mobile-link px-4 py-3 bg-emerald-800 text-white rounded-xl font-bold transition">Berita</a>
                <a href="{{ route('galeri.public') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Galeri</a>
                <a href="{{ route('struktur.index') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Struktur Organisasi</a>
            </div>
        </nav>
    </div>

    <!-- Main Content Detail -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 sm:pt-32 pb-16 flex-1 w-full">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-gray-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-emerald-800 transition">Beranda</a>
            <span>&bull;</span>
            <a href="{{ route('berita.public') }}" class="hover:text-emerald-800 transition">Berita</a>
            <span>&bull;</span>
            <span class="text-gray-800 truncate max-w-xs sm:max-w-md">{{ $berita->judul }}</span>
        </nav>

        <article class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-10 overflow-hidden">
            <!-- Category & Date Header -->
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-800 border border-emerald-200 font-bold px-3 py-1 rounded-full text-xs uppercase tracking-wider">
                    <i class="fa-solid fa-tag text-[10px]"></i>
                    <span>{{ $berita->kategori }}</span>
                </span>

                <span class="text-xs text-gray-500 font-medium inline-flex items-center gap-1.5">
                    <i class="fa-regular fa-calendar text-emerald-700"></i>
                    <span>{{ $berita->created_at->translatedFormat('l, d F Y') }}</span>
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight leading-snug mb-6">
                {{ $berita->judul }}
            </h1>

            <!-- Author & Ranting Info -->
            <div class="flex items-center gap-3 pb-6 mb-8 border-b border-gray-100">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-900 font-extrabold flex items-center justify-center text-xs border border-emerald-200">
                    NU
                </div>
                <div>
                    <div class="font-bold text-sm text-gray-900">Redaksi Warta NU Pandansari</div>
                    <div class="text-xs text-gray-500">Pengurus Ranting Nahdlatul Ulama</div>
                </div>
            </div>

            <!-- Body Text -->
            <div class="text-gray-700 text-base sm:text-lg leading-relaxed space-y-4">
                {!! nl2br(e($berita->konten)) !!}
            </div>

            <!-- Bottom Navigation -->
            <div class="mt-12 pt-6 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                <a href="{{ route('berita.public') }}" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold px-4 py-2 rounded-lg text-xs sm:text-sm transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali ke Semua Berita</span>
                </a>

                <div class="text-xs text-gray-500 font-medium">
                    Dipublikasikan pada {{ $berita->created_at->format('d M Y, H:i') }} WIB
                </div>
            </div>
        </article>

        <!-- Berita Terkait Lainnya -->
        @if(isset($beritaTerkait) && $beritaTerkait->count() > 0)
            <div class="mt-10">
                <h3 class="font-bold text-lg text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-newspaper text-emerald-800"></i>
                    <span>Berita Terkait Lainnya</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($beritaTerkait as $lain)
                        <a href="{{ route('berita.detail', $lain->slug ?? $lain->id) }}" 
                           class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-emerald-300 transition group flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-800 mb-2 inline-block">
                                    {{ $lain->kategori }}
                                </span>
                                <h4 class="font-bold text-sm text-gray-900 group-hover:text-emerald-700 transition line-clamp-2">
                                    {{ $lain->judul }}
                                </h4>
                            </div>
                            <div class="mt-3 text-[11px] text-gray-400 font-medium flex items-center gap-1">
                                <i class="fa-regular fa-calendar text-[10px]"></i>
                                <span>{{ $lain->created_at->format('d M Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-emerald-900 text-emerald-100 mt-auto border-t border-emerald-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-emerald-300">
                <p>&copy; {{ date('Y') }} PRNU Pandansari. All rights reserved.</p>
                <a href="{{ url('/') }}" class="text-emerald-200 hover:text-white transition font-medium inline-flex items-center gap-1">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
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
