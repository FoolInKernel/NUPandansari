<x-app-layout>
    <!-- Konten Utama Dashboard Tanpa Header Bawaan Breeze -->
    <div class="py-10 bg-gradient-to-br from-emerald-50 via-gray-50 to-emerald-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Judul Halaman Kustom & Status -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 bg-white p-6 rounded-2xl shadow-sm border border-emerald-100">
                <div>
                    <h2 class="font-black text-2xl text-emerald-900 tracking-tight uppercase flex items-center gap-2">
                        <span>⚡ Panel Admin Utama</span>
                    </h2>
                    <p class="text-xs font-semibold text-emerald-700 mt-0.5">Pengurus Ranting Nahdlatul Ulama Desa Pandansari</p>
                </div>
                <div class="bg-emerald-800 text-yellow-400 text-xs font-bold px-3 py-1.5 rounded-full shadow-inner flex items-center gap-1.5 border border-emerald-700">
                    <span class="w-2 h-2 rounded-full bg-yellow-400 animate-pulse"></span>
                    Sistem Aktif & Terhubung
                </div>
            </div>

            <!-- Kotak Selamat Datang (Hero Card) -->
            <div class="relative bg-gradient-to-r from-emerald-900 via-emerald-800 to-emerald-950 text-white rounded-2xl shadow-xl p-8 overflow-hidden border border-emerald-700">
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-emerald-700/20 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute right-20 top-0 w-32 h-32 bg-yellow-400/10 rounded-full blur-xl pointer-events-none"></div>
                
                <div class="relative z-10 max-w-3xl">
                    <span class="bg-yellow-400/20 text-yellow-300 border border-yellow-400/30 text-xs font-extrabold px-3 py-1 rounded-md uppercase tracking-wider inline-block mb-3">
                        Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-black text-yellow-400 tracking-tight leading-snug">
                        Pusat Kendali & Manajemen Informasi NU Pandansari
                    </h3>
                    <p class="mt-3 text-emerald-100 text-sm sm:text-base font-medium leading-relaxed opacity-90">
                        Gunakan panel navigasi di bawah ini untuk mengelola publikasi berita, galeri kegiatan, struktur kepengurusan ranting serta badan otonom secara real-time.
                    </p>
                </div>
            </div>

            <!-- Bagian Grid Menu Utama -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-extrabold text-gray-800 text-lg uppercase tracking-wide flex items-center gap-2">
                        <span>📌</span> Modul Pengelolaan Website
                    </h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Card Berita -->
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 p-6 flex flex-col justify-between border border-emerald-100 relative group">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-emerald-600 rounded-t-xl"></div>
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition-transform">
                                📢
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-1">Kelola Berita</h4>
                            <p class="text-gray-600 text-xs sm:text-sm mb-6 leading-relaxed">
                                Tulis pengumuman, hasil kajian, atau artikel kegiatan ranting terbaru untuk warga.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('berita.index') }}" class="w-full flex items-center justify-center gap-2 bg-emerald-700 text-white font-bold text-sm px-4 py-2.5 rounded-lg hover:bg-emerald-800 shadow-sm transition">
                                <span>Buka Menu</span>
                                <span class="text-lg leading-none">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card Galeri -->
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 p-6 flex flex-col justify-between border border-emerald-100 relative group">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-yellow-500 rounded-t-xl"></div>
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-yellow-50 text-yellow-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition-transform">
                                📸
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-1">Kelola Galeri</h4>
                            <p class="text-gray-600 text-xs sm:text-sm mb-6 leading-relaxed">
                                Unggah dokumentasi foto kegiatan lengkap dengan narasi dan deskripsi acara.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('galeri-admin.index') }}" class="w-full flex items-center justify-center gap-2 bg-yellow-400 text-emerald-950 font-extrabold text-sm px-4 py-2.5 rounded-lg hover:bg-yellow-500 shadow-sm transition">
                                <span>Kelola Galeri</span>
                                <span class="text-lg leading-none">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card Struktur Organisasi -->
                    <div class="bg-white rounded-xl shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 p-6 flex flex-col justify-between border border-emerald-100 relative group">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-emerald-700 rounded-t-xl"></div>
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xl mb-4 group-hover:scale-110 transition-transform">
                                🏛️
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg mb-1">Struktur Organisasi</h4>
                            <p class="text-gray-600 text-xs sm:text-sm mb-6 leading-relaxed">
                                Atur daftar pimpinan, wakil, hingga anggota ranting dan Banom secara terstruktur.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('pengurus.index') }}" class="w-full flex items-center justify-center gap-2 bg-emerald-700 text-white font-bold text-sm px-4 py-2.5 rounded-lg hover:bg-emerald-800 shadow-sm transition">
                                <span>Kelola Pengurus</span>
                                <span class="text-lg leading-none">&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- Card Warga (Segera Hadir) -->
                    <div class="bg-white/80 rounded-xl shadow-sm p-6 flex flex-col justify-between border border-dashed border-gray-300 relative">
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-gray-300 rounded-t-xl"></div>
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center font-bold text-xl mb-4">
                                👥
                            </div>
                            <h4 class="font-bold text-gray-500 text-lg mb-1">Data Warga NU</h4>
                            <p class="text-gray-400 text-xs sm:text-sm mb-6 leading-relaxed">
                                Modul basis data kependudukan warga nahdliyin tingkat desa.
                            </p>
                        </div>
                        <div>
                            <span class="w-full inline-flex items-center justify-center bg-gray-100 text-gray-500 font-bold text-xs px-4 py-2.5 rounded-lg cursor-not-allowed">
                                Segera Hadir...
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>