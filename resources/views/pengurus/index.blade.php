<x-app-layout>
    <div class="py-10 bg-gradient-to-br from-emerald-50 via-gray-50 to-emerald-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Header & Tombol Tambah -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-2xl shadow-sm border border-emerald-100">
                <div>
                    <h2 class="font-black text-2xl text-emerald-900 tracking-tight uppercase">
                        🏛️ Kelola Struktur Organisasi
                    </h2>
                    <p class="text-xs font-semibold text-emerald-700 mt-0.5">Atur pimpinan, wakil, dan anggota tiap Banom</p>
                </div>
                <a href="{{ route('pengurus.create') }}" class="bg-emerald-700 text-white font-bold px-4 py-2.5 rounded-xl shadow hover:bg-emerald-800 transition text-sm">
                    + Tambah Pengurus Baru
                </a>
            </div>

            @if (session('success'))
                <div class="p-4 bg-emerald-100 text-emerald-900 border border-emerald-300 rounded-xl font-bold shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tab Filter Organisasi -->
            <div class="flex flex-wrap gap-2 bg-white p-4 rounded-xl shadow-sm border border-emerald-100">
                @foreach($daftar_organisasi as $org)
                    <a href="{{ route('pengurus.index', ['organisasi' => $org]) }}" 
                       class="px-4 py-2 rounded-lg font-bold text-sm transition {{ $selectedOrg === $org ? 'bg-emerald-800 text-yellow-400 shadow' : 'bg-gray-100 text-gray-700 hover:bg-emerald-100' }}">
                        {{ $org }}
                    </a>
                @endforeach
            </div>

            <!-- Tabel Data Pengurus -->
            <div class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden">
                <div class="p-6 bg-emerald-900 text-white flex justify-between items-center">
                    <h3 class="font-bold text-lg text-yellow-400">Daftar Pengurus: {{ $selectedOrg }}</h3>
                    <span class="text-xs bg-emerald-800 px-3 py-1 rounded-full text-emerald-100">Total: {{ count($penguruses) }} Orang</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 uppercase text-xs font-bold border-b border-gray-200">
                                <th class="p-4">Urutan</th>
                                <th class="p-4">Nama Lengkap</th>
                                <th class="p-4">Jabatan</th>
                                <th class="p-4">Kategori Tipe</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse ($penguruses as $p)
                                <tr class="hover:bg-emerald-50/50 transition">
                                    <td class="p-4 font-bold text-gray-500">{{ $p->urutan }}</td>
                                    <td class="p-4 font-bold text-gray-900">{{ $p->nama }}</td>
                                    <td class="p-4 text-emerald-800 font-semibold">{{ $p->jabatan }}</td>
                                    <td class="p-4">
                                        @if($p->tipe == 'pimpinan')
                                            <span class="bg-yellow-100 text-yellow-800 font-bold px-2.5 py-1 rounded-md text-xs uppercase">Pimpinan / Inti</span>
                                        @else
                                            <span class="bg-blue-100 text-blue-800 font-bold px-2.5 py-1 rounded-md text-xs uppercase">Anggota</span>
                                        @endif
                                    </td>
                                  <td class="p-4 text-center flex justify-center gap-2">
                                        <!-- Tombol Print Baru -->
                                        <button onclick="bukaModalPrint({{ $p->id }}, '{{ addslashes($p->nama) }}', '{{ addslashes($p->jabatan) }}', '{{ $p->organisasi }}', '{{ $p->tipe }}')" class="bg-blue-100 text-blue-800 font-bold px-3 py-1.5 rounded-lg border border-black shadow-sm hover:bg-blue-200 transition text-xs">
                                            🖨️ Print
                                        </button>
                                        
                                        <!-- Tombol Edit & Hapus yang sudah ada -->
                                        <a href="{{ route('pengurus.edit', $p->id) }}" class="bg-yellow-400 text-emerald-950 font-bold px-3 py-1.5 rounded-lg border border-black shadow-sm hover:bg-yellow-500 transition text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus data pengurus ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-50 text-red-600 font-bold px-3 py-1.5 rounded-lg border border-black hover:bg-red-600 hover:text-white transition text-xs">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-gray-500 font-medium">
                                        Belum ada data pengurus untuk organisasi {{ $selectedOrg }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal Print Card -->
    <div id="modalPrint" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl border border-black p-6 w-full max-w-sm relative">
            <button onclick="tutupModalPrint()" class="absolute top-3 right-4 text-gray-500 hover:text-black font-extrabold text-lg">
                &times;
            </button>
            
            <h3 class="text-xl font-black text-emerald-900 mb-4 border-b border-black pb-2">Preview ID Card</h3>
            
            <!-- Tampilan Card Mini di Pop-up -->
            <div class="bg-emerald-50 border border-black rounded-lg p-5 text-center mb-6 relative">
                <div class="text-xs font-bold text-emerald-900 border-b border-black pb-2 mb-3 uppercase tracking-wider">
                    NU Desa Pandansari
                </div>
                <h4 class="font-extrabold text-xl text-black mb-1" id="previewNama">Nama</h4>
                <p class="text-sm font-bold text-emerald-700 mb-3" id="previewJabatan">Jabatan</p>
                <span class="bg-yellow-200 text-gray-800 border border-black text-xs font-bold px-3 py-1 rounded" id="previewOrganisasi">
                    Organisasi
                </span>
            </div>
            
            <div class="flex justify-center gap-3">
                <a id="btnDownloadPdf" href="#" class="flex-1 text-center bg-emerald-700 text-white font-bold px-4 py-2.5 rounded-lg border border-black hover:bg-emerald-800 shadow-sm transition">
                    ⬇️ Download PDF
                </a>
                <button onclick="tutupModalPrint()" class="bg-gray-200 text-gray-800 font-bold px-4 py-2.5 rounded-lg border border-black hover:bg-gray-300 transition">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        function bukaModalPrint(id, nama, jabatan, organisasi, tipe) {
            // Isi teks di dalam modal
            document.getElementById('previewNama').innerText = nama;
            document.getElementById('previewJabatan').innerText = jabatan;
            document.getElementById('previewOrganisasi').innerText = organisasi + ' - ' + (tipe === 'pimpinan' ? 'Pimpinan' : 'Anggota');
            
            // Set link tombol download agar mengarah ke route PDF
            document.getElementById('btnDownloadPdf').href = `/pengurus/${id}/pdf`;
            
            // Tampilkan modal
            document.getElementById('modalPrint').classList.remove('hidden');
        }

        function tutupModalPrint() {
            document.getElementById('modalPrint').classList.add('hidden');
        }
    </script>
</x-app-layout>