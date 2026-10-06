<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan - NU Pandansari</title>

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
                    <a href="{{ route('berita.public') }}" class="px-4 py-2 rounded-full hover:text-yellow-300 hover:bg-emerald-900 transition">
                        Berita
                    </a>
                    <a href="{{ route('galeri.public') }}" class="px-4 py-2 rounded-full bg-emerald-800 text-yellow-300 shadow-sm transition">
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
                <a href="{{ route('berita.public') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-900 rounded-xl transition flex items-center gap-2">
                    <i class="fa-solid fa-newspaper w-5 text-center text-sm"></i>
                    <span>Berita</span>
                </a>
                <a href="{{ route('galeri.public') }}" class="mobile-link px-4 py-3 bg-emerald-800 text-yellow-400 rounded-xl font-bold transition flex items-center gap-2">
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

    <!-- Header Banner Halaman Galeri -->
    <div class="bg-gradient-to-b from-emerald-950 via-emerald-900 to-emerald-800 text-white pt-32 pb-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
        <div class="max-w-4xl mx-auto relative z-10">
            <span class="inline-flex items-center gap-1.5 text-xs font-black uppercase tracking-wider text-amber-300 bg-amber-400/20 border border-amber-400/30 px-3 py-1 rounded-full mb-3">
                <i class="fa-solid fa-images text-[11px]"></i>
                <span>Arsip Dokumentasi Visual</span>
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight">
                Galeri Kegiatan <span class="text-yellow-400">NU Pandansari</span>
            </h1>
            <p class="mt-3 text-sm sm:text-base text-emerald-100/90 max-w-xl mx-auto leading-relaxed">
                Dokumentasi foto kegiatan peringatan hari besar Islam, pengajian, rapat kepengurusan, dan aktivitas banom.
            </p>

            <!-- Search Bar -->
            <form action="{{ route('galeri.public') }}" method="GET" class="mt-8 max-w-lg mx-auto flex items-center gap-2 bg-white/10 p-1.5 rounded-full border border-white/20 backdrop-blur-xs">
                <div class="pl-4 text-emerald-200">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </div>
                <input type="text" name="cari" value="{{ $cari ?? '' }}"
                       placeholder="Cari dokumentasi kegiatan..."
                       class="bg-transparent border-0 text-white placeholder-emerald-200/70 text-xs sm:text-sm focus:ring-0 w-full py-2">
                <button type="submit" class="bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold px-5 py-2 rounded-full text-xs transition shadow-sm">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- Konten Galeri -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex-1 w-full">
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200">
            <div>
                <h2 class="font-black text-xl text-slate-900">Semua Foto Dokumentasi</h2>
                <p class="text-xs text-slate-500 mt-0.5">Total {{ $totalGaleri }} dokumentasi kegiatan terarsip</p>
            </div>

            @if($cari)
                <div class="text-xs text-slate-500">
                    Mencari "<strong class="text-slate-900">{{ $cari }}</strong>"
                    <a href="{{ route('galeri.public') }}" class="text-rose-600 hover:underline ml-2">
                        <i class="fa-solid fa-xmark"></i> Hapus Filter
                    </a>
                </div>
            @endif
        </div>

        <!-- Grid Cards Galeri -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($galeris as $foto)
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col overflow-hidden group">
                    <!-- Foto Wrapper -->
                    <div class="aspect-[16/10] bg-slate-100 overflow-hidden relative cursor-pointer" onclick="bukaModalFoto('{{ asset('storage/' . $foto->foto) }}', '{{ addslashes($foto->judul) }}', '{{ addslashes($foto->deskripsi) }}')">
                        <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $foto->judul }}"
                             class="w-full h-full object-cover group-hover:scale-108 transition duration-500">

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                            <span class="text-xs font-bold text-white bg-slate-900/70 backdrop-blur-xs px-3 py-1.5 rounded-full inline-flex items-center gap-1.5">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                <span>Perbesar Foto</span>
                            </span>
                        </div>

                        <div class="absolute top-3 right-3 bg-slate-900/60 backdrop-blur-xs text-white text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm">
                            <i class="fa-solid fa-camera"></i>
                            <span>Foto</span>
                        </div>
                    </div>

                    <!-- Keterangan Foto -->
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-extrabold text-sm text-slate-900 group-hover:text-emerald-800 transition line-clamp-1 mb-1.5">
                                {{ $foto->judul }}
                            </h3>
                            <p class="text-slate-600 text-xs line-clamp-3 leading-relaxed">
                                {{ $foto->deskripsi }}
                            </p>
                        </div>

                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                            <button onclick="bukaModalFoto('{{ asset('storage/' . $foto->foto) }}', '{{ addslashes($foto->judul) }}', '{{ addslashes($foto->deskripsi) }}')"
                                    class="font-bold text-amber-700 hover:text-amber-900 inline-flex items-center gap-1 transition">
                                <span>Lihat Penuh</span>
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </button>
                            <span class="text-[11px] text-slate-400 font-semibold">
                                {{ $foto->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full border border-dashed border-slate-300 p-16 text-center text-slate-500 bg-white rounded-2xl">
                    <div class="w-14 h-14 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3 text-xl">
                        <i class="fa-solid fa-images"></i>
                    </div>
                    <p class="font-bold text-slate-700 text-base">Tidak ada dokumentasi galeri ditemukan.</p>
                    <p class="text-xs text-slate-400 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galeris->hasPages())
            <div class="mt-12">
                {{ $galeris->links() }}
            </div>
        @endif
    </main>

    <!-- Modal Lightbox Galeri -->
    <div id="modalFoto" class="fixed inset-0 z-50 hidden bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full overflow-hidden relative transform transition-all">
            <button onclick="tutupModalFoto()" class="absolute top-3 right-3 text-slate-500 hover:text-slate-800 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm flex items-center justify-center font-bold text-lg shadow-sm transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="max-h-[70vh] bg-slate-950 flex items-center justify-center overflow-hidden">
                <img id="modalFotoImg" src="" alt="Foto" class="max-h-[70vh] w-auto object-contain">
            </div>
            <div class="p-6">
                <h4 id="modalFotoJudul" class="font-black text-lg text-slate-900 mb-2">Judul</h4>
                <p id="modalFotoDeskripsi" class="text-slate-600 text-xs sm:text-sm leading-relaxed">Deskripsi</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-emerald-950 text-emerald-100 border-t border-emerald-900 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-emerald-300/80 text-center sm:text-left">
                <p>&copy; {{ date('Y') }} Pengurus Ranting Nahdlatul Ulama Desa Pandansari. All rights reserved.</p>
                <a href="{{ url('/') }}" class="font-bold text-yellow-400 hover:underline">&larr; Kembali ke Beranda</a>
            </div>
        </div>
    </footer>

    <!-- Navbar Script & Lightbox -->
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

        function bukaModalFoto(src, judul, deskripsi) {
            document.getElementById('modalFotoImg').src = src;
            document.getElementById('modalFotoJudul').innerText = judul;
            document.getElementById('modalFotoDeskripsi').innerText = deskripsi;
            document.getElementById('modalFoto').classList.remove('hidden');
        }

        function tutupModalFoto() {
            document.getElementById('modalFoto').classList.add('hidden');
        }

        document.getElementById('modalFoto').addEventListener('click', function(e) {
            if (e.target === this) {
                tutupModalFoto();
            }
        });
    </script>
</body>
</html>
