<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota {{ $organisasi }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <nav class="bg-emerald-800 text-yellow-400 shadow-md border-b-2 border-emerald-900 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            <div class="font-bold text-xl flex items-center gap-2">
                <span>👥 Anggota {{ $organisasi }}</span>
            </div>
            <a href="{{ route('struktur.index') }}" class="bg-yellow-400 text-emerald-900 font-bold px-4 py-2 rounded shadow-sm hover:bg-yellow-500 transition text-sm">
                &larr; Kembali
            </a>
        </div>
    </nav>

    <div class="flex-grow max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
        <div class="mb-8 border-b-2 border-emerald-200 pb-4">
            <h1 class="text-2xl md:text-3xl font-extrabold text-emerald-900 uppercase">Daftar Anggota {{ $organisasi }}</h1>
            <p class="text-gray-600 font-medium mt-1">Ranting Desa Pandansari</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
            @if(count($anggotas) > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach($anggotas as $index => $anggota)
                        <li class="p-4 hover:bg-emerald-50 transition flex items-center gap-4">
                            <span class="bg-emerald-100 text-emerald-800 font-bold rounded-full h-8 w-8 flex items-center justify-center text-sm">
                                {{ $index + 1 }}
                            </span>
                            <div>
                                <p class="text-gray-900 font-bold text-lg">{{ $anggota->nama }}</p>
                                <p class="text-emerald-700 text-sm font-medium">{{ $anggota->jabatan }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="p-12 text-center text-gray-500 font-medium">
                    Belum ada data anggota untuk {{ $organisasi }}.
                </div>
            @endif
        </div>
    </div>

    <footer class="bg-emerald-900 text-center py-6 text-emerald-300 text-sm font-bold">
        &copy; 2026 PRNU Pandansari. All rights reserved.
    </footer>
</body>
</html>