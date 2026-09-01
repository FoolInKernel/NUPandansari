<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            Dashboard Admin
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Kotak Selamat Datang -->
            <div class="bg-white border-2 border-emerald-600 shadow-md sm:rounded-lg p-6">
                <h3 class="text-xl font-bold text-emerald-900">
                    Selamat datang di Panel Admin NU Desa Gumelar!
                </h3>
                <p class="mt-2 text-gray-700 font-medium">
                    Anda login sebagai Pengurus. Gunakan menu navigasi di atas untuk mengelola data website.
                </p>
            </div>

            <!-- Menu Bawah -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Card Berita -->
                <div class="bg-white border-2 border-black shadow-md sm:rounded-lg p-6">
                    <h4 class="font-bold text-black text-lg mb-2">📢 Kelola Berita</h4>
                    <p class="text-gray-700 mb-4 text-sm font-medium">Tulis pengumuman, kajian, atau berita kegiatan ranting terbaru.</p>
                    <a href="{{ route('berita.index') }}" class="inline-block bg-emerald-700 text-white font-bold px-4 py-2 rounded hover:bg-emerald-800">
                        Buka Menu Berita &rarr;
                    </a>
                </div>

                <!-- Card Warga -->
                <div class="bg-white border-2 border-black shadow-md sm:rounded-lg p-6">
                    <h4 class="font-bold text-black text-lg mb-2">👥 Data Warga NU</h4>
                    <p class="text-gray-700 mb-4 text-sm font-medium">Modul pendataan warga dan anggota Banom (Ansor, Fatayat, dll).</p>
                    <span class="inline-block bg-gray-300 text-gray-700 font-bold px-4 py-2 rounded cursor-not-allowed">
                        Fitur Segera Hadir...
                    </span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>