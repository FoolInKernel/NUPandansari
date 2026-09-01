<!DOCTYPE html>
<!-- Tambahkan scroll-smooth agar saat menu navbar diklik, layarnya geser dengan halus -->
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resmi NU Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <!-- Tambahkan sticky top-0 z-50 agar navbar tetap menempel di atas saat discroll -->
    <nav class="bg-emerald-800 text-yellow-400 shadow-md sticky top-0 z-50 border-b-2 border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="font-bold text-xl md:text-2xl flex items-center gap-2">
                    <span>🌐 NU Desa Pandansari</span>
                </div>
                
                <!-- Menu Navbar Publik -->
                <div class="hidden md:flex space-x-6 font-bold text-sm">
                    <a href="#berita" class="hover:text-white transition">Berita</a>
                    <a href="#galeri" class="hover:text-white transition">Galeri</a>
                    <a href="#struktur" class="hover:text-white transition">Struktur Organisasi</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Banner / Hero -->
    <div class="bg-emerald-700 text-yellow-300 text-center py-24 px-4 border-b-4 border-emerald-900">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-yellow-400">Selamat Datang di Website Resmi NU Desa</h1>
        <p class="text-lg md:text-xl max-w-2xl mx-auto opacity-90 text-yellow-100">Pusat informasi, dakwah, dan kegiatan warga Nahdlatul Ulama tingkat ranting.</p>
    </div>

    <!-- Daftar Berita Terkini -->
    <!-- Tambahkan id="berita" sebagai target link navbar -->
    <div id="berita" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-2xl font-bold border-b-2 border-emerald-600 pb-2 mb-8 inline-block text-gray-900">Berita & Informasi Terbaru</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($beritas as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border-2 border-black hover:shadow-lg transition flex flex-col">
                    <div class="p-6 flex-1">
                        <span class="text-xs font-bold inline-block py-1 px-2 uppercase rounded text-emerald-900 bg-emerald-200 mb-3 border border-black">
                            {{ $item->kategori }}
                        </span>
                        <h3 class="text-xl font-bold mb-2 text-black">{{ $item->judul }}</h3>

                        <p class="text-gray-700 text-sm mb-4 line-clamp-3 font-medium">
                            {{ Str::limit($item->konten, 120) }}
                        </p>
                    </div>
                    <div class="px-6 py-3 bg-gray-100 border-t-2 border-black text-xs text-gray-600 font-bold">
                        Dipublikasikan: {{ $item->created_at->format('d M Y') }}
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-black font-bold py-12 bg-white rounded-lg border-2 border-dashed border-black">
                    Belum ada informasi atau berita yang dipublikasikan saat ini.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Galeri Kegiatan -->
    <!-- Tambahkan id="galeri" -->
    <div id="galeri" class="bg-emerald-50 border-t-2 border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-2xl font-bold border-b-2 border-emerald-600 pb-2 mb-8 inline-block text-gray-900">Galeri Kegiatan</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden border-2 border-black hover:shadow-xl transition relative group">
                    <img src="{{ asset('storage/foto/fotbar1_1.jpg') }}" alt="Galeri" class="w-full h-full object-cover">
                </div>
                <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden border-2 border-black hover:shadow-xl transition relative group">
                    <img src="{{ asset('storage/foto/fotbar2.jpeg') }}" alt="Galeri" class="w-full h-full object-cover">
                </div>
                <!-- Foto Dummy 3 -->
                <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden border-2 border-black hover:shadow-xl transition relative group">
                    <img src="{{ asset('storage/foto/fotbar3.jpeg') }}" alt="Galeri" class="w-full h-full object-cover">
                </div>
                <!-- Foto Dummy 4 -->
                <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden border-2 border-black hover:shadow-xl transition relative group">
                    <img src="{{ asset('storage/foto/fotbar4.jpeg') }}" alt="Galeri" class="w-full h-full object-cover">
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="#" class="inline-block bg-white text-black font-bold px-6 py-2 rounded-md border-2 border-black hover:bg-yellow-400 transition shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    Lihat Semua Foto
                </a>
            </div>
        </div>
    </div>
    
    <!-- Struktur Organisasi -->
    <!-- Tambahkan id="struktur" dan desain Hierarki -->
    <div id="struktur" class="bg-white border-t-2 border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
            <h2 class="text-2xl font-bold border-b-2 border-emerald-600 pb-2 mb-12 inline-block text-gray-900 uppercase">
                Struktur Organisasi Ranting
            </h2>

            <!-- Baris 1: Syuriyah & Tanfidziyah -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 mb-8">
                <!-- Box Syuriyah -->
                <div class="bg-emerald-100 border-2 border-black rounded-lg p-6 w-full md:w-72 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)]">
                    <h3 class="text-emerald-900 font-bold mb-2 border-b-2 border-black pb-2 text-sm uppercase">Rais Syuriyah</h3>
                    <p class="text-black font-extrabold text-xl">K.H. Nama Kiai</p>
                </div>
                
                <!-- Box Tanfidziyah -->
                <div class="bg-emerald-100 border-2 border-black rounded-lg p-6 w-full md:w-72 shadow-[6px_6px_0px_0px_rgba(0,0,0,1)]">
                    <h3 class="text-emerald-900 font-bold mb-2 border-b-2 border-black pb-2 text-sm uppercase">Ketua Tanfidziyah</h3>
                    <p class="text-black font-extrabold text-xl">Ust. Nama Ketua</p>
                </div>
            </div>

            <!-- Baris 2: Sekretaris & Bendahara -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 mb-12">
                <div class="bg-white border-2 border-black rounded-lg p-4 w-full md:w-64 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <h3 class="text-gray-600 font-bold text-xs uppercase mb-1">Sekretaris</h3>
                    <p class="text-black font-bold text-lg">Nama Sekretaris</p>
                </div>
                <div class="bg-white border-2 border-black rounded-lg p-4 w-full md:w-64 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <h3 class="text-gray-600 font-bold text-xs uppercase mb-1">Bendahara</h3>
                    <p class="text-black font-bold text-lg">Nama Bendahara</p>
                </div>
            </div>

            <!-- Baris 3: Banom / Lembaga -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gray-100 border-2 border-black rounded p-3 text-sm font-bold text-black hover:bg-yellow-300 transition cursor-pointer">Ketua GP Ansor</div>
                <div class="bg-gray-100 border-2 border-black rounded p-3 text-sm font-bold text-black hover:bg-yellow-300 transition cursor-pointer">Ketua Fatayat</div>
                <div class="bg-gray-100 border-2 border-black rounded p-3 text-sm font-bold text-black hover:bg-yellow-300 transition cursor-pointer">Ketua Muslimat</div>
                <div class="bg-gray-100 border-2 border-black rounded p-3 text-sm font-bold text-black hover:bg-yellow-300 transition cursor-pointer">Ketua IPNU-IPPNU</div>
            </div>

        </div>
    </div>

</body>
</html> 