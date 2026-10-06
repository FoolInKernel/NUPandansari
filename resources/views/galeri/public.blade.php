<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan - NU Pandansari</title>
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
                    <a href="{{ route('berita.public') }}" class="px-5 py-2 rounded-full hover:bg-emerald-700 text-emerald-100 transition">Berita</a>
                    <a href="{{ route('galeri.public') }}" class="px-5 py-2 rounded-full bg-emerald-900 shadow-sm text-white transition">Galeri</a>
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
                <a href="{{ route('berita.public') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Berita</a>
                <a href="{{ route('galeri.public') }}" class="mobile-link px-4 py-3 bg-emerald-800 text-white rounded-xl font-bold transition">Galeri</a>
                <a href="{{ route('struktur.index') }}" class="mobile-link px-4 py-3 text-emerald-100 font-bold hover:bg-emerald-800 rounded-xl transition">Struktur Organisasi</a>
            </div>
        </nav>
    </div>

    <!-- Main Content (Tanpa Banner Besar) -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 sm:pt-32 pb-16 flex-1 w-full">
        
        <!-- Header Judul & Pencarian -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b border-gray-200">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 flex items-center gap-2">
                    <i class="fa-solid fa-images text-emerald-700"></i>
                    <span>Galeri & Dokumentasi Kegiatan</span>
                </h1>
                <p class="text-sm text-gray-600 mt-1">
                    Dokumentasi visual rangkaian kegiatan warga Nahdlatul Ulama Desa Pandansari.
                </p>
            </div>

            <!-- Form Pencarian -->
            <form action="{{ route('galeri.public') }}" method="GET" class="flex items-center gap-2 max-w-md w-full">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input type="text" name="cari" value="{{ $cari ?? '' }}"
                           placeholder="Cari dokumentasi..."
                           class="pl-9 pr-4 py-2 w-full text-sm bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-600 focus:border-emerald-600">
                </div>
                <button type="submit" class="bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-bold px-4 py-2 rounded-lg transition shadow-sm whitespace-nowrap">
                    Cari
                </button>
            </form>
        </div>

        @if($cari)
            <div class="mb-6 text-xs text-gray-500">
                Hasil pencarian: "<strong class="text-gray-900">{{ $cari }}</strong>"
                <a href="{{ route('galeri.public') }}" class="text-red-600 hover:underline ml-2">
                    <i class="fa-solid fa-xmark"></i> Hapus Filter
                </a>
            </div>
        @endif

        <!-- Grid Cards Galeri -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($galeris as $foto)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200 flex flex-col overflow-hidden group">
                    <!-- Foto Wrapper -->
                    <div class="aspect-video bg-gray-100 overflow-hidden relative cursor-pointer" onclick="bukaModalFoto('{{ asset('storage/' . $foto->foto) }}', '{{ addslashes($foto->judul) }}', '{{ addslashes($foto->deskripsi) }}')">
                        <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $foto->judul }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-300">

                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                            <span class="text-xs font-bold text-white bg-emerald-800/90 px-3 py-1.5 rounded-full inline-flex items-center gap-1.5 shadow">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                                <span>Lihat Foto</span>
                            </span>
                        </div>
                    </div>

                    <!-- Info Foto -->
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm leading-snug group-hover:text-emerald-700 transition">
                                {{ $foto->judul }}
                            </h3>
                            @if($foto->deskripsi)
                                <p class="text-gray-500 text-xs mt-1.5 line-clamp-2 leading-relaxed">
                                    {{ $foto->deskripsi }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-3 pt-3 border-t border-gray-100 text-[11px] text-gray-400 font-medium flex items-center gap-1">
                            <i class="fa-regular fa-calendar text-[10px]"></i>
                            <span>{{ $foto->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full border border-dashed border-gray-300 p-12 text-center text-gray-500 bg-white rounded-xl">
                    <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 flex items-center justify-center mx-auto mb-3 text-lg">
                        <i class="fa-solid fa-images"></i>
                    </div>
                    <p class="font-bold text-gray-700 text-base">Belum ada dokumentasi galeri ditemukan.</p>
                    <p class="text-xs text-gray-400 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galeris->hasPages())
            <div class="mt-10">
                {{ $galeris->links() }}
            </div>
        @endif
    </main>

    <!-- Modal Pop-up Foto Detail -->
    <div id="modalFoto" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-xs flex items-center justify-center p-4" onclick="tutupModalFoto(event)">
        <div class="bg-white rounded-2xl max-w-3xl w-full overflow-hidden shadow-2xl relative flex flex-col max-h-[90vh]" onclick="event.stopPropagation()">
            <!-- Close Button -->
            <button onclick="tutupModalFoto()" class="absolute top-3 right-3 z-10 w-8 h-8 rounded-full bg-black/60 text-white hover:bg-black flex items-center justify-center transition">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- Modal Image -->
            <div class="bg-black flex items-center justify-center max-h-[60vh] overflow-hidden">
                <img id="modalImg" src="" alt="" class="max-h-[60vh] w-auto object-contain">
            </div>

            <!-- Modal Details -->
            <div class="p-6 bg-white overflow-y-auto">
                <h3 id="modalTitle" class="text-lg font-bold text-gray-900 leading-snug"></h3>
                <p id="modalDesc" class="text-sm text-gray-600 mt-2 leading-relaxed"></p>
            </div>
        </div>
    </div>

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

        function bukaModalFoto(src, judul, deskripsi) {
            document.getElementById('modalImg').src = src;
            document.getElementById('modalTitle').innerText = judul;
            document.getElementById('modalDesc').innerText = deskripsi || 'Tidak ada keterangan tambahan.';
            document.getElementById('modalFoto').classList.remove('hidden');
        }

        function tutupModalFoto() {
            document.getElementById('modalFoto').classList.add('hidden');
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') tutupModalFoto();
        });
    </script>
</body>
</html>
