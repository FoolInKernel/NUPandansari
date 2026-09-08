<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi - NU Pandansari</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-emerald-800 text-yellow-400 shadow-md border-b-2 border-emerald-900 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            <div class="font-bold text-xl flex items-center gap-2">
                <span>🏛️ Struktur Organisasi</span>
            </div>
            <a href="{{ url('/') }}" class="bg-yellow-400 text-emerald-900 font-bold px-4 py-2 rounded shadow-sm hover:bg-yellow-500 transition text-sm">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </nav>

    <!-- Konten -->
    <div class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
        <div class="mb-10 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 uppercase">Susunan Pengurus & Banom</h1>
            <p class="text-gray-600 font-medium mt-2">Pimpinan dan anggota kelembagaan Nahdlatul Ulama Ranting Desa Pandansari.</p>
        </div>

        @foreach ($daftar_organisasi as $org)
            <div class="mb-12 bg-white border border-emerald-200 rounded-lg shadow-sm overflow-hidden">
                <!-- Header Organisasi -->
                <div class="bg-emerald-100 px-6 py-4 border-b border-emerald-200 flex justify-between items-center flex-wrap gap-4">
                    <h2 class="text-2xl font-bold text-emerald-900 uppercase">{{ $org }}</h2>
                    <a href="{{ route('struktur.anggota', $org) }}" class="bg-emerald-700 text-white text-sm font-bold px-4 py-2 rounded hover:bg-emerald-800 transition shadow-sm">
                        👥 Lihat Daftar Anggota {{ $org }} &rarr;
                    </a>
                </div>

                <!-- Daftar Pimpinan (Kiai, Ketua, Wakil, dll) -->
                <div class="p-6">
                    @if(isset($pimpinans[$org]) && count($pimpinans[$org]) > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 text-left">
                            @foreach ($pimpinans[$org] as $pimpinan)
                                <div class="bg-emerald-50 border border-emerald-200 rounded p-4 shadow-sm">
                                    <h3 class="text-emerald-700 font-bold mb-1 text-xs uppercase tracking-wide">
                                        {{ $pimpinan->jabatan }}
                                    </h3>
                                    <p class="text-gray-900 font-extrabold text-base leading-tight">
                                        {{ $pimpinan->nama }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic text-center py-6">Data pimpinan {{ $org }} belum diisi oleh Admin.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Footer Simple -->
    <footer class="bg-emerald-900 text-center py-6 text-emerald-300 text-sm font-bold">
        &copy; 2026 PRNU Pandansari. All rights reserved.
    </footer>
</body>
</html>