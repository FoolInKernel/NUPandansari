<x-app-layout>
    <div class="py-10 bg-gradient-to-br from-emerald-50 via-gray-50 to-emerald-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-emerald-100 shadow-sm rounded-2xl p-8">
                
                <h2 class="font-black text-2xl text-emerald-900 tracking-tight uppercase mb-6">
                    ✏️ Edit Data Pengurus
                </h2>

                <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST" class="space-y-4">
                    @csrf @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Pilih Badan Organisasi / Banom</label>
                        <select name="organisasi" class="w-full border-gray-300 rounded-xl p-2.5 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 font-bold" required>
                            @foreach($daftar_organisasi as $org)
                                <option value="{{ $org }}" {{ $pengurus->organisasi == $org ? 'selected' : '' }}>{{ $org }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Tipe / Kategori Posisi</label>
                        <select name="tipe" class="w-full border-gray-300 rounded-xl p-2.5 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 font-bold" required>
                            <option value="pimpinan" {{ $pengurus->tipe == 'pimpinan' ? 'selected' : '' }}>Pimpinan (Tampil di Halaman Utama)</option>
                            <option value="anggota" {{ $pengurus->tipe == 'anggota' ? 'selected' : '' }}>Anggota (Tampil di Daftar Anggota Khusus)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan', $pengurus->jabatan) }}" class="w-full border-gray-300 rounded-xl p-2.5 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" value="{{ old('nama', $pengurus->nama) }}" class="w-full border-gray-300 rounded-xl p-2.5 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Nomor Urutan Tampil</label>
                        <input type="number" name="urutan" value="{{ old('urutan', $pengurus->urutan) }}" class="w-full border-gray-300 rounded-xl p-2.5 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                    </div>

                    <div class="flex gap-4 pt-4 border-t border-gray-100 mt-6">
                        <button type="submit" class="bg-emerald-700 text-white font-bold px-6 py-2.5 rounded-xl shadow hover:bg-emerald-800 transition">Simpan Perubahan</button>
                        <a href="{{ route('pengurus.index') }}" class="bg-gray-200 text-gray-700 font-bold px-6 py-2.5 rounded-xl hover:bg-gray-300 transition flex items-center">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>