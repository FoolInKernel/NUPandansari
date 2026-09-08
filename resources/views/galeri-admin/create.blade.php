<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-emerald-900 leading-tight">Upload Foto Galeri</h2>
    </x-slot>

    <div class="py-12 bg-emerald-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 shadow-md sm:rounded-lg p-6">
                
                <form action="{{ route('galeri-admin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Judul Kegiatan</label>
                        <input type="text" name="judul" class="w-full border-gray-300 rounded-md p-2 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="3" class="w-full border-gray-300 rounded-md p-2 shadow-sm focus:border-emerald-500 focus:ring-emerald-500" required></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-emerald-900 mb-1">Pilih File Foto (Maks 2MB)</label>
                        <input type="file" name="foto" accept="image/png, image/jpeg, image/jpg" class="w-full border border-gray-300 rounded-md p-2 bg-gray-50 cursor-pointer" required>
                    </div>
                    
                    <div class="flex gap-4 pt-4 border-t border-gray-200 mt-4">
                        <button type="submit" class="bg-emerald-700 text-white font-bold px-4 py-2 rounded hover:bg-emerald-800 transition">Upload Foto</button>
                        <a href="{{ route('galeri-admin.index') }}" class="bg-gray-300 text-gray-800 font-bold px-4 py-2 rounded hover:bg-gray-400 transition flex items-center">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>