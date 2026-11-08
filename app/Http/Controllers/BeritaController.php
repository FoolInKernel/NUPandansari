<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('berita.index', compact('beritas'));
    }

    /**
     * Halaman publik daftar semua berita (tanpa auth).
     */
    public function publicIndex(Request $request)
    {
        $kategoriAktif = $request->query('kategori');
        $cari = $request->query('cari');

        $query = Berita::latest();

        if ($kategoriAktif) {
            $query->where('kategori', $kategoriAktif);
        }

        if ($cari) {
            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'like', "%{$cari}%")
                  ->orWhere('konten', 'like', "%{$cari}%");
            });
        }

        $beritas = $query->paginate(9)->withQueryString();

        $kategoriCounts = Berita::selectRaw("kategori, count(*) as total")
            ->groupBy('kategori')
            ->pluck('total', 'kategori');
        $kategoriCounts->prepend(Berita::count(), 'Semua');

        return view('berita.public', compact('beritas', 'kategoriAktif', 'kategoriCounts', 'cari'));
    }

    /**
     * Halaman detail satu berita (tanpa auth).
     */
    public function detail(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|in:Kajian,Pengumuman,Opini,Lainnya',
            'konten'   => 'required|string',
            'foto'     => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['judul']) . '-' . uniqid();
        
        if ($request->hasFile('foto')) {
            $validated['foto'] = ImageHelper::convertToWebp($request->file('foto'), 'berita');
        }

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|in:Kajian,Pengumuman,Opini,Lainnya',
            'konten'   => 'required|string',
            'foto'     => 'nullable|image|max:2048',
        ]);

        $data = [
            'judul'    => $validated['judul'],
            'kategori' => $validated['kategori'],
            'konten'   => $validated['konten'],
            'slug'     => Str::slug($validated['judul']) . '-' . uniqid(),
        ];

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $data['foto'] = ImageHelper::convertToWebp($request->file('foto'), 'berita');
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
