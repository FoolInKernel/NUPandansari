<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Header Halaman -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-xl shadow-sm border border-emerald-100">
                <div>
                    <h2 class="font-bold text-2xl text-emerald-950 tracking-tight flex items-center gap-2">
                        <i class="fa-solid fa-users-gear text-emerald-700"></i>
                        <span>Kelola Struktur Organisasi</span>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Atur pimpinan, wakil, dan anggota tiap Banom</p>
                </div>
                <div>
                    <a href="{{ route('pengurus.create') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-sm px-4 py-2.5 rounded-lg shadow transition inline-flex items-center gap-2">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah Pengurus Baru</span>
                    </a>
                </div>
            </div>

            <!-- Notifikasi Flash Sukses -->
            @if(session('success'))
                <div class="p-4 bg-emerald-100 text-emerald-900 border border-emerald-300 rounded-xl font-bold shadow-sm flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-700"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Tab Filter Organisasi -->
            <div class="flex flex-wrap gap-2 bg-white p-4 rounded-xl shadow-sm border border-emerald-100">
                @foreach($daftar_organisasi as $org)
                    <a href="{{ route('pengurus.index', ['organisasi' => $org]) }}" 
                       class="px-4 py-2 rounded-lg font-bold text-sm transition {{ $selectedOrg === $org ? 'bg-emerald-800 text-white shadow' : 'bg-gray-100 text-gray-700 hover:bg-emerald-100' }}">
                        {{ $org }}
                    </a>
                @endforeach
            </div>

            <!-- Tabel Data Pengurus -->
            <div class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden">
                <div class="p-6 bg-emerald-900 text-white flex justify-between items-center">
                    <h3 class="font-bold text-lg text-emerald-100">Daftar Pengurus: {{ $selectedOrg }}</h3>
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
                                            <span class="bg-emerald-100 text-emerald-800 font-bold px-2.5 py-1 rounded-md text-xs uppercase">Pimpinan / Inti</span>
                                        @else
                                            <span class="bg-blue-100 text-blue-800 font-bold px-2.5 py-1 rounded-md text-xs uppercase">Anggota</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-center flex justify-center gap-2">
                                        <!-- Tombol Print -->
                                        <button onclick="bukaModalPrint({{ $p->id }}, '{{ addslashes($p->nama) }}', '{{ addslashes($p->jabatan) }}', '{{ $p->organisasi }}', '{{ $p->tipe }}')" class="bg-blue-50 text-blue-700 font-bold px-3 py-1.5 rounded-lg border border-blue-200 shadow-sm hover:bg-blue-100 transition text-xs inline-flex items-center gap-1.5">
                                            <i class="fa-solid fa-print text-xs"></i>
                                            <span>Print</span>
                                        </button>
                                        
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('pengurus.edit', $p->id) }}" class="bg-amber-50 text-amber-800 font-bold px-3 py-1.5 rounded-lg border border-amber-200 shadow-sm hover:bg-amber-100 transition text-xs inline-flex items-center gap-1.5">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                            <span>Edit</span>
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus data pengurus ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-50 text-red-600 font-bold px-3 py-1.5 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white transition text-xs inline-flex items-center gap-1.5">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                                <span>Hapus</span>
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
    <div id="modalPrint" class="fixed inset-0 z-50 hidden bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 w-full max-w-sm relative">
            <button onclick="tutupModalPrint()" class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 font-extrabold text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
            
            <h3 class="text-lg font-bold text-emerald-900 mb-4 border-b border-gray-200 pb-2 flex items-center gap-2">
                <i class="fa-solid fa-id-card text-emerald-700"></i>
                <span>Preview Kartu Pengurus</span>
            </h3>
            
            <!-- Tampilan Card Mini di Pop-up -->
            <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-5 text-center mb-6 relative">
                <div class="text-xs font-bold text-emerald-900 border-b border-emerald-200 pb-2 mb-3 uppercase tracking-wider">
                    NU Desa Pandansari
                </div>
                <h4 class="font-extrabold text-xl text-gray-900 mb-1" id="previewNama">Nama</h4>
                <p class="text-sm font-bold text-emerald-700 mb-3" id="previewJabatan">Jabatan</p>
                <span class="bg-emerald-200 text-emerald-900 text-xs font-bold px-3 py-1 rounded-full" id="previewOrganisasi">
                    Organisasi
                </span>
            </div>
            
            <div class="flex justify-center gap-3">
                <a id="btnDownloadPdf" href="#" class="flex-1 text-center bg-emerald-700 text-white font-bold px-4 py-2.5 rounded-lg hover:bg-emerald-800 shadow-sm transition inline-flex items-center justify-center gap-2 text-sm">
                    <i class="fa-solid fa-file-pdf text-sm"></i>
                    <span>Download PDF</span>
                </a>
                <button onclick="tutupModalPrint()" class="bg-gray-100 text-gray-700 font-bold px-4 py-2.5 rounded-lg hover:bg-gray-200 transition text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        function bukaModalPrint(id, nama, jabatan, organisasi, tipe) {
            document.getElementById('previewNama').innerText = nama;
            document.getElementById('previewJabatan').innerText = jabatan;
            document.getElementById('previewOrganisasi').innerText = organisasi + ' - ' + (tipe === 'pimpinan' ? 'Pimpinan' : 'Anggota');
            
            document.getElementById('btnDownloadPdf').href = `/pengurus/${id}/pdf`;
            document.getElementById('modalPrint').classList.remove('hidden');
        }

        function tutupModalPrint() {
            document.getElementById('modalPrint').classList.add('hidden');
        }
    </script>
</x-app-layout>
