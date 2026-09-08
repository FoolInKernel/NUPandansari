<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('galeri-admin.index', compact('galeris'));
    }

    public function create()
    {
        return view('galeri-admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('galeri-admin.index')->with('success', 'Foto berhasil diunggah.');
    }
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri-admin.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Boleh kosong jika tidak ganti foto
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        // Jika admin mengunggah foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if (Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('galeri-admin.index')->with('success', 'Data galeri berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if (Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();
        return redirect()->route('galeri-admin.index')->with('success', 'Foto dihapus.');
    }
}
