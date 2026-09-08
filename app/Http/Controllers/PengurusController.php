<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    private $daftar_org = ['NU', 'Muslimat', 'Fatayat', 'GP Ansor', 'Banser', 'IPNU', 'IPPNU'];

    public function index(Request $request)
    {
        // Fitur filter organisasi di halaman admin (opsional)
        $selectedOrg = $request->get('organisasi', 'NU');
        
        $penguruses = Pengurus::where('organisasi', $selectedOrg)
                              ->orderBy('urutan', 'asc')
                              ->get();
                              
        $daftar_organisasi = $this->daftar_org;

        return view('pengurus.index', compact('penguruses', 'daftar_organisasi', 'selectedOrg'));
    }

    public function create()
    {
        $daftar_organisasi = $this->daftar_org;
        return view('pengurus.create', compact('daftar_organisasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'organisasi' => 'required|string',
            'tipe'       => 'required|in:pimpinan,anggota',
            'jabatan'    => 'required|string|max:255',
            'nama'       => 'required|string|max:255',
            'urutan'     => 'required|integer',
        ]);

        Pengurus::create($request->all());

        return redirect()->route('pengurus.index', ['organisasi' => $request->organisasi])
                         ->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $daftar_organisasi = $this->daftar_org;
        return view('pengurus.edit', compact('pengurus', 'daftar_organisasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'organisasi' => 'required|string',
            'tipe'       => 'required|in:pimpinan,anggota',
            'jabatan'    => 'required|string|max:255',
            'nama'       => 'required|string|max:255',
            'urutan'     => 'required|integer',
        ]);

        $pengurus = Pengurus::findOrFail($id);
        $pengurus->update($request->all());

        return redirect()->route('pengurus.index', ['organisasi' => $request->organisasi])
                         ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $org = $pengurus->organisasi;
        $pengurus->delete();

        return redirect()->route('pengurus.index', ['organisasi' => $org])
                         ->with('success', 'Data pengurus berhasil dihapus.');
    }
}