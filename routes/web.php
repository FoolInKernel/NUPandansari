<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\StrukturPublicController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    });
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
Route::resource('berita', BeritaController::class)->parameters([
    'berita' => 'berita'
]);

Route::resource('pengurus', PengurusController::class)->parameters([
    'pengurus' => 'pengurus'
]);

Route::resource('galeri-admin', GaleriController::class);

Route::get('/struktur', [StrukturPublicController::class, 'index'])->name('struktur.index');
Route::get('/struktur/{organisasi}/anggota', [StrukturPublicController::class, 'anggota'])->name('struktur.anggota');