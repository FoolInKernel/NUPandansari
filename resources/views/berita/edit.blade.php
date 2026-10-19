<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            Edit Berita
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:py-12 sm:px-0">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-2 border-black shadow-md sm:rounded-lg p-4 sm:p-6">
                
                <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Judul Berita</label>
                        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="w-full border-2 border-black rounded-md p-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Kategori</label>
                        <select name="kategori" class="w-full border-2 border-black rounded-md p-2" required>
                            <option value="Kajian" @selected($berita->kategori == 'Kajian')>Kajian</option>
                            <option value="Pengumuman" @selected($berita->kategori == 'Pengumuman')>Pengumuman</option>
                            <option value="Opini" @selected($berita->kategori == 'Opini')>Opini</option>
                            <option value="Lainnya" @selected($berita->kategori == 'Lainnya')>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Konten Berita</label>
                        <textarea name="konten" rows="6" class="w-full border-2 border-black rounded-md p-2" required>{{ old('konten', $berita->konten) }}</textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit" class="bg-emerald-700 text-white font-bold px-4 py-2 rounded hover:bg-emerald-800 w-full sm:w-auto">
                            Perbarui Berita
                        </button>
                        <a href="{{ route('berita.index') }}" class="bg-gray-300 text-black font-bold px-4 py-2 rounded hover:bg-gray-400 flex items-center justify-center w-full sm:w-auto">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>