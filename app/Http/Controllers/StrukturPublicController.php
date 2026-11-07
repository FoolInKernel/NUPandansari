<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PengurusController;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class StrukturPublicController extends Controller
{
    public function index()
    {
        $pimpinans = Pengurus::where('tipe', 'pimpinan')
                            ->orderBy('urutan', 'asc')
                            ->get()
                            ->groupBy('organisasi');
        
        $daftar_organisasi = PengurusController::DAFTAR_ORGANISASI;

        return view('struktur.index', compact('pimpinans', 'daftar_organisasi'));
    }

    public function anggota($organisasi)
    {
        // Mengambil pengurus yang tipenya 'anggota' sesuai organisasinya
        $anggotas = Pengurus::where('organisasi', $organisasi)
                            ->where('tipe', 'anggota')
                            ->orderBy('urutan', 'asc')
                            ->get();

        return view('struktur.anggota', compact('anggotas', 'organisasi'));
    }
}