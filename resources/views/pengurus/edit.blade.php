<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6 sm:p-8">
                
                <h2 class="font-bold text-2xl text-emerald-950 tracking-tight mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-user-pen text-emerald-700"></i>
                    <span>Edit Data Pengurus</span>
                </h2>

                <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Badan Organisasi / Banom</label>
                        <select name="organisasi" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 font-semibold" required>
                            @foreach($daftar_organisasi as $org)
                                <option value="{{ $org }}" {{ $pengurus->organisasi == $org ? 'selected' : '' }}>{{ $org }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Tipe / Kategori Posisi</label>
                        <select name="tipe" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 font-semibold" required>
                            <option value="pimpinan" {{ $pengurus->tipe == 'pimpinan' ? 'selected' : '' }}>Pimpinan (Tampil di Halaman Utama)</option>
                            <option value="anggota" {{ $pengurus->tipe == 'anggota' ? 'selected' : '' }}>Anggota (Tampil di Halaman Anggota)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ $pengurus->jabatan }}" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" value="{{ $pengurus->nama }}" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Nomor Urutan Tampil</label>
                        <input type="number" name="urutan" value="{{ $pengurus->urutan }}" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600" required>
                    </div>

                    <div class="flex gap-3 pt-4 border-t border-gray-100 mt-6">
                        <button type="submit" class="bg-emerald-700 text-white font-bold px-6 py-2.5 rounded-lg shadow hover:bg-emerald-800 transition inline-flex items-center gap-2">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Perbarui Data</span>
                        </button>
                        <a href="{{ route('pengurus.index') }}" class="bg-gray-100 text-gray-700 font-bold px-6 py-2.5 rounded-lg hover:bg-gray-200 transition flex items-center">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
