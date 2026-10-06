<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warta & Berita - NU Pandansari</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen">

    <!-- Navbar Wrapper (Fixed) -->
    <div id="navbar-wrapper" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 pt-4 px-4 sm:px-6 lg:px-8">
        <nav id="main-nav" class="bg-emerald-950/95 text-emerald-100 max-w-7xl mx-auto rounded-full shadow-lg px-6 lg:px-8 transition-all duration-300 relative backdrop-blur-sm border border-emerald-800/80">
            <div class="flex justify-between items-center h-16">

                <!-- Logo & Judul Kiri -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-full bg-white p-0.5 ring-2 ring-yellow-400/80 shadow-sm flex items-center justify-center overflow-hidden transition group-hover:scale-105">
                            <img src="{{ asset('storage/logoNU.jpg') }}" alt="Logo NU" class="w-full h-full object-cover" onerror="this.onerror=null; this.parentElement.innerHTML='<i class=\'fa-solid fa-mosque text-emerald-800 text-lg\'></i>';">
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="font-black text-lg text-yellow-400 leading-none tracking-tight group-hover:text-yellow-300 transition">NU DESA</span>
                            <span class="text-xs text-emerald-200 font-semibold mt-0.5">Pandansari</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1 font-bold text-xs uppercase tracking-wider">
                    <a href="{{ url('/') }}" class="px-4 py-2 rounded-full hover:text-yellow-300 hover:bg-emerald-900 transition">
                        Beranda
                    </a>
                    <a href="{{ route('berita.public') }}" class="px-4 py-2 rounded-full bg-emerald-800 text-yellow-300 shadow-sm transition">
                        Berita
                    </a>
                    <a href="{{ route('galeri.public') }}" class="px-4 py-2 rounded-full hover:text-yellow-300 hover:bg-emerald-900 transition">
                        Galeri
                    </a>
                    <a href="{{ route('struktur.index') }}" class="px-4 py-2 rounded-full hover:text-yellow-300 hover:bg-emerald-900 transition">
                        Struktur Organisasi
                    </a>
                </div>

                <!-- Right Action Button: Login Pengurus -->
                <div class="hidden md:flex items-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold text-yellow-300 bg-emerald-900 hover:bg-emerald-800 border border-emerald-700/80 transition">
                        <i class="fa-solid fa-lock text-[10px]"></i>
                        <span>Admin</span>
                    </a>
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
            <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 right-0 mt-3 bg-emerald-950/95 border border-emerald-800 rounded-2xl shadow-xl p-3 flex flex-col gap-1 backdrop-blur-md">
                <a href="{{ url('/') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-900 rounded-xl transition flex items-center gap-2">
                    <i class="fa-solid fa-house w-5 text-center text-sm"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('berita.public') }}" class="mobile-link px-4 py-3 bg-emerald-800 text-yellow-400 rounded-xl font-bold transition flex items-center gap-2">
                    <i class="fa-solid fa-newspaper w-5 text-center text-sm"></i>
                    <span>Berita</span>
                </a>
                <a href="{{ route('galeri.public') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-900 rounded-xl transition flex items-center gap-2">
                    <i class="fa-solid fa-images w-5 text-center text-sm"></i>
                    <span>Galeri</span>
                </a>
                <a href="{{ route('struktur.index') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-900 rounded-xl transition flex items-center gap-2">
                    <i class="fa-solid fa-sitemap w-5 text-center text-sm"></i>
                    <span>Struktur Organisasi</span>
                </a>
                <a href="{{ route('login') }}" class="mobile-link px-4 py-3 text-yellow-300 font-bold hover:bg-emerald-900 rounded-xl transition flex items-center gap-2 border-t border-emerald-900">
                    <i class="fa-solid fa-lock w-5 text-center text-sm"></i>
                    <span>Login Pengurus</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Header Banner Halaman Berita -->
    <div class="bg-gradient-to-b from-emerald-950 via-emerald-900 to-emerald-800 text-white pt-32 pb-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
        <div class="max-w-4xl mx-auto relative z-10">
            <span class="inline-flex items-center gap-1.5 text-xs font-black uppercase tracking-wider text-yellow-300 bg-yellow-400/20 border border-yellow-400/30 px-3 py-1 rounded-full mb-3">
                <i class="fa-solid fa-newspaper text-[11px]"></i>
                <span>Arsip Publikasi & Warta</span>
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight">
                Warta & Berita <span class="text-yellow-400">NU Pandansari</span>
            </h1>
            <p class="mt-3 text-sm sm:text-base text-emerald-100/90 max-w-xl mx-auto leading-relaxed">
                Seluruh warta kegiatan, kajian Islam Aswaja, pengumuman ranting, dan opini dakwah terkini.
            </p>

            <!-- Search Bar -->
            <form action="{{ route('berita.public') }}" method="GET" class="mt-8 max-w-lg mx-auto flex items-center gap-2 bg-white/10 p-1.5 rounded-full border border-white/20 backdrop-blur-xs">
                @if($kategoriAktif)
                    <input type="hidden" name="kategori" value="{{ $kategoriAktif }}">
                @endif
                <div class="pl-4 text-emerald-200">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" name="cari" value="{{ $cari ?? '' }}"
                       placeholder="Cari judul atau isi berita..."
                       class="bg-transparent border-0 text-white placeholder-emerald-200/70 text-xs sm:text-sm focus:ring-0 w-full py-2">
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-300 text-emerald-950 font-bold px-5 py-2 rounded-full text-xs transition shadow-sm">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- Konten Berita -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex-1 w-full">
        <!-- Filter Kategori Tabs -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-8 pb-4 border-b border-slate-200">
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('berita.public') }}"
                   class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition {{ !$kategoriAktif ? 'bg-emerald-800 text-yellow-300 shadow-sm' : 'bg-white text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 border border-slate-200' }}">
                    Semua ({{ $kategoriCounts['Semua'] }})
                </a>
                <a href="{{ route('berita.public', ['kategori' => 'Kajian']) }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition {{ $kategoriAktif == 'Kajian' ? 'bg-emerald-800 text-yellow-300 shadow-sm' : 'bg-white text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 border border-slate-200' }}">
                    <i class="fa-solid fa-book-quran text-xs"></i>
                    <span>Kajian ({{ $kategoriCounts['Kajian'] }})</span>
                </a>
                <a href="{{ route('berita.public', ['kategori' => 'Pengumuman']) }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition {{ $kategoriAktif == 'Pengumuman' ? 'bg-emerald-800 text-yellow-300 shadow-sm' : 'bg-white text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 border border-slate-200' }}">
                    <i class="fa-solid fa-bullhorn text-xs"></i>
                    <span>Pengumuman ({{ $kategoriCounts['Pengumuman'] }})</span>
                </a>
                <a href="{{ route('berita.public', ['kategori' => 'Opini']) }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition {{ $kategoriAktif == 'Opini' ? 'bg-emerald-800 text-yellow-300 shadow-sm' : 'bg-white text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 border border-slate-200' }}">
                    <i class="fa-solid fa-pen-nib text-xs"></i>
                    <span>Opini ({{ $kategoriCounts['Opini'] }})</span>
                </a>
                <a href="{{ route('berita.public', ['kategori' => 'Lainnya']) }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition {{ $kategoriAktif == 'Lainnya' ? 'bg-emerald-800 text-yellow-300 shadow-sm' : 'bg-white text-slate-700 hover:bg-emerald-50 hover:text-emerald-800 border border-slate-200' }}">
                    <i class="fa-solid fa-folder text-xs"></i>
                    <span>Lainnya ({{ $kategoriCounts['Lainnya'] }})</span>
                </a>
            </div>

            @if($cari)
                <div class="text-xs text-slate-500">
                    Hasil pencarian untuk "<strong class="text-slate-900">{{ $cari }}</strong>"
                    <a href="{{ route('berita.public', $kategoriAktif ? ['kategori' => $kategoriAktif] : []) }}" class="text-rose-600 hover:underline ml-2">
                        <i class="fa-solid fa-xmark"></i> Hapus Filter
                    </a>
                </div>
            @endif
        </div>

        <!-- Grid Cards Berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse ($beritas as $item)
                <article class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between overflow-hidden group">
                    <!-- Top Gradient Accent -->
                    <div class="h-2 w-full bg-gradient-to-r from-emerald-700 via-emerald-600 to-yellow-400"></div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <!-- Kategori & Tanggal -->
                            <div class="flex items-center justify-between gap-2 mb-3">
                                @if($item->kategori == 'Kajian')
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-800 border border-emerald-200 font-bold px-2.5 py-1 rounded-full text-[11px] uppercase tracking-wider">
                                        <i class="fa-solid fa-book-quran text-[10px]"></i>
                                        <span>{{ $item->kategori }}</span>
                                    </span>
                                @elseif($item->kategori == 'Pengumuman')
                                    <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-800 border border-amber-200 font-bold px-2.5 py-1 rounded-full text-[11px] uppercase tracking-wider">
                                        <i class="fa-solid fa-bullhorn text-[10px]"></i>
                                        <span>{{ $item->kategori }}</span>
                                    </span>
                                @elseif($item->kategori == 'Opini')
                                    <span class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-800 border border-indigo-200 font-bold px-2.5 py-1 rounded-full text-[11px] uppercase tracking-wider">
                                        <i class="fa-solid fa-pen-nib text-[10px]"></i>
                                        <span>{{ $item->kategori }}</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 border border-slate-200 font-bold px-2.5 py-1 rounded-full text-[11px] uppercase tracking-wider">
                                        <i class="fa-solid fa-folder text-[10px]"></i>
                                        <span>{{ $item->kategori }}</span>
                                    </span>
                                @endif

                                <span class="text-xs text-slate-400 font-semibold inline-flex items-center gap-1">
                                    <i class="fa-regular fa-calendar text-[10px]"></i>
                                    <span>{{ $item->created_at->format('d M Y') }}</span>
                                </span>
                            </div>

                            <!-- Judul Berita -->
                            <h3 class="text-lg sm:text-xl font-black text-slate-900 group-hover:text-emerald-800 transition leading-snug">
                                <a href="{{ route('berita.detail', $item->slug ?? $item->id) }}" class="hover:underline">
                                    {{ $item->judul }}
                                </a>
                            </h3>

                            <!-- Snippet Konten -->
                            <p class="text-slate-600 text-xs sm:text-sm mt-3 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($item->konten), 130) }}
                            </p>
                        </div>

                        <!-- Read More Button -->
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Ranting Pandansari</span>
                            <a href="{{ route('berita.detail', $item->slug ?? $item->id) }}"
                               class="inline-flex items-center gap-1.5 text-xs font-black text-emerald-800 hover:text-emerald-950 group-hover:translate-x-1 transition-transform">
                                <span>Baca Selengkapnya</span>
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full border border-dashed border-slate-300 p-16 text-center text-slate-500 bg-white rounded-2xl">
                    <div class="w-14 h-14 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3 text-xl">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <p class="font-bold text-slate-700 text-base">Tidak ada warta berita ditemukan.</p>
                    <p class="text-xs text-slate-400 mt-1">Coba gunakan kata kunci pencarian lain atau pilih kategori berbeda.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($beritas->hasPages())
            <div class="mt-12">
                {{ $beritas->links() }}
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-emerald-950 text-emerald-100 border-t border-emerald-900 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-emerald-300/80 text-center sm:text-left">
                <p>&copy; {{ date('Y') }} Pengurus Ranting Nahdlatul Ulama Desa Pandansari. All rights reserved.</p>
                <a href="{{ url('/') }}" class="font-bold text-yellow-400 hover:underline">&larr; Kembali ke Beranda</a>
            </div>
        </div>
    </footer>

    <!-- Navbar Script -->
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
                wrapper.className = 'fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-emerald-950/95 shadow-md py-2.5 px-4 sm:px-6 lg:px-8 backdrop-blur-md';
                nav.className = 'text-emerald-100 max-w-7xl mx-auto flex justify-between items-center transition-all duration-300 relative';
            } else {
                wrapper.className = 'fixed top-0 left-0 w-full z-50 transition-all duration-300 pt-4 px-4 sm:px-6 lg:px-8';
                nav.className = 'bg-emerald-950/95 text-emerald-100 max-w-7xl mx-auto rounded-full shadow-lg px-6 lg:px-8 transition-all duration-300 relative backdrop-blur-sm border border-emerald-800/80';
            }
        });
    </script>
</body>
</html>
