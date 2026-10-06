<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(3)->get();
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();

        return view('welcome', compact('beritas', 'galeris', 'totalBerita', 'totalGaleri'));
    }
}
