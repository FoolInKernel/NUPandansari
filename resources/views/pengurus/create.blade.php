<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6 sm:p-8">
                
                <h2 class="font-bold text-2xl text-emerald-950 tracking-tight mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-user-plus text-emerald-700"></i>
                    <span>Tambah Pengurus / Anggota</span>
                </h2>

                <form action="{{ route('pengurus.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Pilih Badan Organisasi / Banom</label>
                        <select name="organisasi" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 font-semibold" required>
                            @foreach($daftar_organisasi as $org)
                                <option value="{{ $org }}">{{ $org }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Tipe / Kategori Posisi</label>
                        <select name="tipe" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600 font-semibold" required>
                            <option value="pimpinan">Pimpinan (Ketuanya/Wakil/Inti - Tampil di Halaman Utama)</option>
                            <option value="anggota">Anggota (Tampil di Daftar Anggota Khusus)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Jabatan (Contoh: Ketua, Wakil Ketua, Sekretaris, dll)</label>
                        <input type="text" name="jabatan" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600" required placeholder="Ketua Tanfidziyah">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600" required placeholder="K.H. Ahmad Dahlan">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-800 mb-1">Nomor Urutan Tampil (Angka terkecil tampil di atas)</label>
                        <input type="number" name="urutan" value="1" class="w-full border-gray-300 rounded-lg p-2.5 shadow-sm focus:border-emerald-600 focus:ring-emerald-600" required>
                    </div>

                    <div class="flex gap-3 pt-4 border-t border-gray-100 mt-6">
                        <button type="submit" class="bg-emerald-700 text-white font-bold px-6 py-2.5 rounded-lg shadow hover:bg-emerald-800 transition inline-flex items-center gap-2">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Simpan Data</span>
                        </button>
                        <a href="{{ route('pengurus.index') }}" class="bg-gray-100 text-gray-700 font-bold px-6 py-2.5 rounded-lg hover:bg-gray-200 transition flex items-center">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
