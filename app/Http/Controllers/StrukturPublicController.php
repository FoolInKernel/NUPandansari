<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class StrukturPublicController extends Controller
{
    public function index()
    {
        // Mengambil pengurus yang tipenya 'pimpinan' dan mengelompokkannya per organisasi
        $pimpinans = Pengurus::where('tipe', 'pimpinan')
                            ->orderBy('urutan', 'asc')
                            ->get()
                            ->groupBy('organisasi');
        
        // Daftar organisasi utama
        $daftar_organisasi = ['NU', 'Muslimat', 'Fatayat', 'GP Ansor', 'Banser', 'IPNU', 'IPPNU'];

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