<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - NU Pandansari</title>
    
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

    <!-- Article Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 flex-1 w-full">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-6">
            <a href="{{ url('/') }}" class="hover:text-emerald-800 transition">Beranda</a>
            <span>&bull;</span>
            <a href="{{ route('berita.public') }}" class="hover:text-emerald-800 transition">Warta</a>
            <span>&bull;</span>
            <span class="text-slate-800 font-bold truncate max-w-xs sm:max-w-md">{{ $berita->judul }}</span>
        </nav>

        <article class="bg-white rounded-3xl border border-slate-200/90 shadow-sm p-6 sm:p-10 overflow-hidden">
            <!-- Category & Date Header -->
            <div class="flex flex-wrap items-center gap-3 mb-4">
                @if($berita->kategori == 'Kajian')
                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-800 border border-emerald-200 font-bold px-3 py-1 rounded-full text-xs uppercase tracking-wider">
                        <i class="fa-solid fa-book-quran text-xs"></i>
                        <span>{{ $berita->kategori }}</span>
                    </span>
                @elseif($berita->kategori == 'Pengumuman')
                    <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-800 border border-amber-200 font-bold px-3 py-1 rounded-full text-xs uppercase tracking-wider">
                        <i class="fa-solid fa-bullhorn text-xs"></i>
                        <span>{{ $berita->kategori }}</span>
                    </span>
                @elseif($berita->kategori == 'Opini')
                    <span class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-800 border border-indigo-200 font-bold px-3 py-1 rounded-full text-xs uppercase tracking-wider">
                        <i class="fa-solid fa-pen-nib text-xs"></i>
                        <span>{{ $berita->kategori }}</span>
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 bg-slate-100 text-slate-700 border border-slate-200 font-bold px-3 py-1 rounded-full text-xs uppercase tracking-wider">
                        <i class="fa-solid fa-folder text-xs"></i>
                        <span>{{ $berita->kategori }}</span>
                    </span>
                @endif

                <span class="text-xs text-slate-400 font-semibold inline-flex items-center gap-1.5">
                    <i class="fa-regular fa-calendar text-emerald-700"></i>
                    <span>{{ $berita->created_at->translatedFormat('l, d F Y') }}</span>
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-black text-slate-900 tracking-tight leading-snug mb-6">
                {{ $berita->judul }}
            </h1>

            <!-- Author & Ranting Info -->
            <div class="flex items-center gap-3 pb-6 mb-8 border-b border-slate-100">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-900 font-black flex items-center justify-center text-sm border border-emerald-200">
                    NU
                </div>
                <div>
                    <div class="font-extrabold text-sm text-slate-900">Redaksi Warta NU Pandansari</div>
                    <div class="text-xs text-slate-400">Pengurus Ranting Nahdlatul Ulama</div>
                </div>
            </div>

            <!-- Body Text -->
            <div class="text-slate-700 text-base sm:text-lg leading-relaxed space-y-4">
                {!! nl2br(e($berita->konten)) !!}
            </div>

            <!-- Bottom Share / Navigation -->
            <div class="mt-12 pt-6 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                <a href="{{ route('berita.public') }}" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold px-5 py-2.5 rounded-xl text-xs sm:text-sm transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali ke Semua Berita</span>
                </a>

                <div class="text-xs text-slate-500 font-medium">
                    Dipublikasikan pada {{ $berita->created_at->format('d M Y, H:i') }} WIB
                </div>
            </div>
        </article>

        <!-- Berita Terkait Lainnya -->
        @if($beritaLainnya->count() > 0)
            <div class="mt-12">
                <h3 class="font-black text-xl text-slate-900 mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-newspaper text-emerald-800"></i>
                    <span>Warta Terkini Lainnya</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($beritaLainnya as $lain)
                        <a href="{{ route('berita.detail', $lain->slug ?? $lain->id) }}" 
                           class="bg-white p-5 rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-emerald-200 transition group flex flex-col justify-between">
                            <div>
                                <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-md bg-emerald-50 text-emerald-800 mb-2 inline-block">
                                    {{ $lain->kategori }}
                                </span>
                                <h4 class="font-extrabold text-sm text-slate-900 group-hover:text-emerald-800 transition line-clamp-2">
                                    {{ $lain->judul }}
                                </h4>
                            </div>
                            <div class="mt-3 text-[11px] text-slate-400 font-medium flex items-center gap-1">
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
