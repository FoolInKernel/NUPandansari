<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-emerald-900 leading-tight">Kelola Galeri Kegiatan</h2>
    </x-slot>

    <div class="py-6 px-4 sm:py-12 sm:px-0 bg-emerald-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div
                    class="mb-6 p-4 bg-emerald-100 text-emerald-900 border border-emerald-300 rounded-md font-bold shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('galeri-admin.create') }}"
                class="inline-block mb-6 bg-emerald-700 text-white font-bold px-5 py-2 rounded shadow-md hover:bg-emerald-800 transition hover:-translate-y-1">
                + Upload Foto Baru
            </a>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($galeris as $item)
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition flex flex-col justify-between overflow-hidden">

                        <!-- Foto & Teks Utama -->
                        <div>
                            <div class="aspect-video bg-gray-200 overflow-hidden border-b border-gray-200">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Galeri"
                                    class="w-full h-full object-cover">
                            </div>

                            <div class="p-4">
                                <p class="font-bold text-emerald-900 text-sm mb-2">{{ $item->judul }}</p>

                                <!-- Sistem Lihat Selengkapnya -->
                                <div>
                                    <!-- Teks Singkat (Maks 4 Kata) -->
                                    <p class="text-gray-600 text-sm" id="short-{{ $item->id }}">
                                        {{ Str::words($item->deskripsi, 4, '...') }}
                                    </p>

                                    <!-- Teks Penuh (Disembunyikan default) -->
                                    <p class="text-gray-600 text-sm hidden" id="full-{{ $item->id }}">
                                        {{ $item->deskripsi }}
                                    </p>

                                    <!-- Tombol Toggle (Hanya Muncul jika lebih dari 4 kata) -->
                                    @if (str_word_count($item->deskripsi) > 4)
                                        <button type="button" onclick="toggleDesc({{ $item->id }})"
                                            id="btn-{{ $item->id }}"
                                            class="text-emerald-700 font-bold text-xs mt-1 hover:underline focus:outline-none">
                                            Lihat selengkapnya
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi (Edit & Hapus) -->
                        <div class="p-4 bg-gray-50 border-t border-gray-100 flex gap-2">
                            <a href="{{ route('galeri-admin.edit', $item->id) }}"
                                class="flex-1 text-center bg-yellow-400 text-emerald-900 font-bold px-3 py-2 rounded shadow hover:bg-yellow-500 transition text-sm">
                                Edit
                            </a>
                            <form action="{{ route('galeri-admin.destroy', $item->id) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="w-full bg-red-50 text-red-600 font-bold px-3 py-2 rounded border border-red-200 text-sm hover:bg-red-600 hover:text-white transition shadow-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full border border-dashed border-gray-300 p-8 text-center text-gray-500 font-medium bg-white rounded-lg">
                        Belum ada dokumentasi foto yang diunggah.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Script JavaScript Murni untuk Efek Expand Card -->
    <script>
        function toggleDesc(id) {
            const shortText = document.getElementById('short-' + id);
            const fullText = document.getElementById('full-' + id);
            const btn = document.getElementById('btn-' + id);

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
</x-app-layout>
