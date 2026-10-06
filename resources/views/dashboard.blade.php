<x-app-layout>
    <!-- Konten Utama Dashboard Tanpa Header Bawaan Breeze -->
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Judul Halaman & Status -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <div>
                    <h2 class="font-bold text-2xl text-gray-900 tracking-tight flex items-center gap-2">
                        <i class="fa-solid fa-gauge-high text-emerald-700"></i>
                        <span>Panel Admin Utama</span>
                    </h2>
                    <p class="text-sm text-gray-500 mt-0.5">Pengurus Ranting Nahdlatul Ulama Desa Pandansari</p>
                </div>
                <div class="bg-emerald-50 text-emerald-700 text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Sistem Aktif
                </div>
            </div>

            <!-- Kotak Selamat Datang (Hero Card) -->
            <div class="bg-emerald-800 text-white rounded-xl shadow-md p-8 relative overflow-hidden">
                <div class="relative z-10 max-w-3xl">
                    <span class="bg-emerald-700 text-emerald-100 text-xs font-bold px-3 py-1 rounded-md inline-block mb-3">
                        Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-bold tracking-tight leading-snug">
                        Pusat Kendali & Manajemen Informasi NU Pandansari
                    </h3>
                    <p class="mt-3 text-emerald-100 text-sm sm:text-base leading-relaxed opacity-90">
                        Gunakan panel navigasi di bawah ini untuk mengelola publikasi berita, galeri kegiatan, struktur kepengurusan ranting serta badan otonom secara real-time.
                    </p>
                </div>
            </div>

            <!-- Bagian Grid Menu Utama -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-grid-2 text-emerald-700"></i>
                        Modul Pengelolaan Website
                    </h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Card Berita -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 p-6 flex flex-col justify-between border border-gray-200 group">
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-newspaper text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-1">Kelola Berita</h4>
                            <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                                Tulis pengumuman, hasil kajian, atau artikel kegiatan ranting terbaru untuk warga.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('berita.index') }}" class="w-full flex items-center justify-center gap-2 bg-emerald-700 text-white font-bold text-sm px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition">
                                <span>Buka Menu</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card Galeri -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 p-6 flex flex-col justify-between border border-gray-200 group">
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-images text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-1">Kelola Galeri</h4>
                            <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                                Unggah dokumentasi foto kegiatan lengkap dengan narasi dan deskripsi acara.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('galeri-admin.index') }}" class="w-full flex items-center justify-center gap-2 bg-amber-500 text-white font-bold text-sm px-4 py-2.5 rounded-lg hover:bg-amber-600 transition">
                                <span>Kelola Galeri</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card Struktur Organisasi -->
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 p-6 flex flex-col justify-between border border-gray-200 group">
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-users text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-1">Struktur Organisasi</h4>
                            <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                                Atur daftar pimpinan, wakil, hingga anggota ranting dan Banom secara terstruktur.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('pengurus.index') }}" class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-bold text-sm px-4 py-2.5 rounded-lg hover:bg-blue-700 transition">
                                <span>Kelola Pengurus</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>