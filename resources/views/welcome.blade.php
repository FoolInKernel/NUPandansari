<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi NU Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-emerald-800 text-yellow-400 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="font-bold text-xl md:text-2xl flex items-center gap-2">
                    <span>🌐 NU Desa Pandansari</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6 font-bold text-sm">
                    <a href="{{ url('/#berita') }}" class="hover:text-white transition">Berita</a>
                    <a href="{{ url('/#galeri') }}" class="hover:text-white transition">Galeri</a>
                    <a href="{{ route('struktur.index') }}" class="hover:text-white transition bg-emerald-900 px-3 py-1 rounded">Struktur Organisasi</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-btn" class="text-yellow-400 hover:text-white focus:outline-none">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path id="menu-icon-close" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden bg-emerald-900 border-t border-emerald-700">
            <a href="{{ url('/#berita') }}" class="mobile-link block px-4 py-3 text-white font-bold border-b border-emerald-800 hover:bg-emerald-700">Berita</a>
            <a href="{{ url('/#galeri') }}" class="mobile-link block px-4 py-3 text-white font-bold border-b border-emerald-800 hover:bg-emerald-700">Galeri</a>
            <a href="{{ route('struktur.index') }}" class="mobile-link block px-4 py-3 text-yellow-300 font-bold hover:bg-emerald-700">Struktur Organisasi</a>
        </div>
    </nav>

    <!-- Banner -->
    <div class="bg-emerald-700 text-yellow-300 text-center py-20 px-4 md:py-24 shadow-inner">
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
                <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg hover:-translate-y-1 transition transform duration-200 flex flex-col overflow-hidden">
                    <div class="p-5 md:p-6 flex-1">
                        <span class="text-xs font-bold inline-block py-1 px-2 uppercase rounded text-emerald-900 bg-emerald-100 mb-3">
                            {{ $item->kategori }}
                        </span>
                        <h3 class="text-lg md:text-xl font-bold mb-2 text-black leading-snug">{{ $item->judul }}</h3>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-3 font-medium">
                            {{ Str::limit($item->konten, 120) }}
                        </p>
                    </div>
                    <div class="px-5 md:px-6 py-4 bg-gray-50 text-xs text-gray-500 font-medium border-t border-gray-100">
                        Dipublikasikan: {{ $item->created_at->format('d M Y') }}
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 font-medium py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                    Belum ada informasi atau berita yang dipublikasikan saat ini.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Galeri Kegiatan -->
    <div id="galeri" class="bg-emerald-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
            <h2 class="text-xl sm:text-2xl font-bold mb-6 md:mb-8 text-gray-900">Galeri Kegiatan</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($galeris as $foto)
                    <div class="bg-white border border-emerald-200 rounded-lg shadow-sm hover:shadow-md transition flex flex-col overflow-hidden group">
                        <div class="aspect-video bg-gray-200 overflow-hidden relative border-b border-gray-100">
                            <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $foto->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-bold text-emerald-900 text-sm mb-2">{{ $foto->judul }}</h3>
                            
                            <!-- Area Deskripsi -->
                            <div class="text-gray-600 text-sm">
                                <span id="short-gal-{{ $foto->id }}">{{ Str::words($foto->deskripsi, 4, '...') }}</span>
                                <span id="full-gal-{{ $foto->id }}" class="hidden">{{ $foto->deskripsi }}</span>
                                
                                @if (str_word_count($foto->deskripsi) > 4)
                                    <button onclick="toggleGaleri({{ $foto->id }})" id="btn-gal-{{ $foto->id }}" class="text-emerald-700 font-bold text-xs mt-2 block hover:underline focus:outline-none">
                                        Lihat selengkapnya
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 font-medium py-12 bg-white rounded-lg shadow-sm border border-emerald-200">
                        Belum ada dokumentasi kegiatan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Footer Minimalis -->
    <footer class="bg-emerald-900 text-emerald-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-6 text-center md:text-left">
                <div>
                    <h2 class="text-xl font-extrabold text-yellow-400 mb-2 flex items-center justify-center md:justify-start gap-2">
                        <span>🌐 NU Pandansari</span>
                    </h2>
                    <p class="text-sm opacity-90 max-w-sm mx-auto md:mx-0">
                        Pusat informasi dan dokumentasi kegiatan warga Nahdlatul Ulama tingkat ranting Desa Pandansari.
                    </p>
                </div>
                <div class="text-sm">
                    <p class="font-bold text-yellow-300 mb-1">Sekretariat Ranting</p>
                    <p>Jl. Nama Jalan Desa No. 12, Pandansari</p>
                    <a href="#" class="inline-block mt-3 bg-yellow-500 text-emerald-900 font-bold px-4 py-1.5 rounded shadow hover:bg-yellow-400 transition text-xs">
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

    <script>
        // Script Navbar Mobile
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const iconBars = document.getElementById('menu-icon-bars');
        const iconClose = document.getElementById('menu-icon-close');
        
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            iconBars.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
        });

        // Script Galeri "Lihat Selengkapnya"
        function toggleGaleri(id) {
            const shortText = document.getElementById('short-gal-' + id);
            const fullText = document.getElementById('full-gal-' + id);
            const btn = document.getElementById('btn-gal-' + id);

            if (fullText.classList.contains('hidden')) {
                fullText.classList.remove('hidden');
                shortText.classList.add('hidden');
                btn.innerText = 'Sembunyikan';
            } else {
                fullText.classList.add('hidden');
                shortText.classList.remove('hidden');
                btn.innerText = 'Lihat selengkapnya';
            }
        }
    </script>
</body>
</html>