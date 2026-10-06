<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $kategoriCounts = [
            'Semua' => Berita::count(),
            'Kajian' => Berita::where('kategori', 'Kajian')->count(),
            'Pengumuman' => Berita::where('kategori', 'Pengumuman')->count(),
            'Opini' => Berita::where('kategori', 'Opini')->count(),
            'Lainnya' => Berita::where('kategori', 'Lainnya')->count(),
        ];

        return view('berita.public', compact('beritas', 'kategoriAktif', 'kategoriCounts', 'cari'));
    }

    /**
     * Halaman detail satu berita (tanpa auth).
     */
    public function detail(Berita $berita)
    {
        $beritaTerkait = Berita::where('id', '!=', $berita->id)
            ->where('kategori', $berita->kategori)
            ->latest()
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaTerkait'));
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
        ]);

        $validated['slug'] = Str::slug($validated['judul']) . '-' . uniqid();

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
        ]);

        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
