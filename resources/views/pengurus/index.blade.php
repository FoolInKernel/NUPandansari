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
                                        <a href="{{ route('pengurus.edit', $p->id) }}" class="bg-yellow-400 text-emerald-950 font-bold px-3 py-1.5 rounded-lg shadow-sm hover:bg-yellow-500 transition text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus data pengurus ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-50 text-red-600 font-bold px-3 py-1.5 rounded-lg border border-red-200 hover:bg-red-600 hover:text-white transition text-xs">
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
</x-app-layout>