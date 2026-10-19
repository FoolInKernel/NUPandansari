<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-900 leading-tight">
            Kelola Berita
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:py-12 sm:px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 p-4 bg-emerald-100 text-emerald-900 border-2 border-emerald-600 rounded-md font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white border-2 border-black shadow-md sm:rounded-lg p-4 sm:p-6">
                <a href="{{ route('berita.create') }}" class="inline-block mb-4 bg-emerald-700 text-white font-bold px-4 py-2 rounded border-2 border-black hover:bg-emerald-800">
                    + Tambah Berita
                </a>

                <div class="overflow-x-auto">
                <table class="w-full border-collapse border-2 border-black">
                    <thead class="bg-emerald-200 border-b-2 border-black text-black">
                        <tr>
                            <th class="border-2 border-black p-2 text-left">Judul</th>
                            <th class="border-2 border-black p-2 text-left">Kategori</th>
                            <th class="border-2 border-black p-2 text-left">Tanggal</th>
                            <th class="border-2 border-black p-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Perulangan menggunakan variabel $berita -->
                        @forelse ($beritas as $berita)
                            <tr class="text-black font-medium">
                                <td class="border-2 border-black p-2">{{ $berita->judul }}</td>
                                <td class="border-2 border-black p-2">{{ $berita->kategori }}</td>
                                <td class="border-2 border-black p-2">{{ $berita->created_at->format('d M Y') }}</td>
                                
                                <td class="border-2 border-black p-2 flex gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('berita.edit', $berita->id) }}" class="bg-yellow-400 text-black font-bold px-3 py-1 rounded border-2 border-black text-sm hover:bg-yellow-500">
                                        Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white font-bold px-3 py-1 rounded border-2 border-black text-sm hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border-2 border-black p-4 text-center text-gray-700 font-bold bg-gray-50">
                                    Belum ada berita.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
                
                <div class="mt-4">
                    {{ $beritas->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>