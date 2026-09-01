<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->take(6)->get();
        return view('welcome', compact('beritas'));
    }
}