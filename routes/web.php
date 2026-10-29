<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IsiProfilController;
use App\Http\Controllers\TingkatAktivitasController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\HalamanOlahragaController;
use App\Http\Controllers\PreferensiMakanController;
use App\Http\Controllers\VisionAIController;
use App\Http\Controllers\RekomendasiMakananController;

// -----------------------------
// ✅ Halaman Awal (Landing Page)
// -----------------------------
Route::get('/', function () {
    return view('welcome');
});

// -----------------------------
// ✅ Halaman Dashboard
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/halaman-dashboard', fn () => view('halaman-dashboard'))->name('halaman-dashboard');
});

// -----------------------------
// ✅ Isi Profil (form awal onboarding)
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/halaman-profil', [IsiProfilController::class, 'showProfil'])->name('halaman-profil');
    Route::post('/halaman-profil', [IsiProfilController::class, 'store'])->name('halaman-profil.store');
    Route::put('/halaman-profil', [IsiProfilController::class, 'update'])->name('halaman-profil.update'); 
});

// -----------------------------
// ✅ Halaman Tingkat Aktivitas Fisik & Waktu
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/halaman-selanjutnya', fn () => view('halaman-selanjutnya'))->name('halaman-selanjutnya');
    Route::get('/tingkat-waktu', fn () => view('tingkat-waktu'))->name('tingkat-waktu');
    Route::post('/tingkat-waktu', [AktivitasController::class, 'store']);
    Route::post('/simpan-waktu-olahraga', [AktivitasController::class, 'simpanWaktu'])->name('simpan-waktu-olahraga');
});

// -----------------------------
// ✅ Halaman Preferensi Makan
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/preferensi-makan', fn () => view('preferensi-makan'))->name('halaman-preferensi-makan');
    Route::post('/simpan-preferensi-makan', [PreferensiMakanController::class, 'simpanPreferensiMakan'])->name('simpan-preferensi-makan');
});

// -----------------------------
// ✅ Halaman Profil (utama untuk user)
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -----------------------------
// ✅ Halaman Lain (Sidebar)
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/deteksi', fn () => view('deteksi'))->name('deteksi');
    Route::post('/simpan-hasil-deteksi', [VisionAIController::class, 'simpanHasilDeteksi'])->name('simpan-hasil-deteksi');
    Route::get('/halaman-makanan', [RekomendasiMakananController::class, 'tampilkanRekomendasi'])->name('halaman-makanan');
    Route::post('/ganti-makanan/{waktu}', [RekomendasiMakananController::class, 'gantiMakanan'])->name('ganti.makanan');
    Route::get('/halaman-olahraga', [HalamanOlahragaController::class, 'index'])->name('halaman-olahraga');
});

// -----------------------------
// ✅ Halaman Dummy / Tambahan
// -----------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/halaman5', fn () => view('halaman5'))->name('halaman5');
    Route::get('/halaman6', fn () => view('halaman6'))->name('halaman6');
    Route::get('/halaman-sebelumnya', fn () => redirect()->route('halaman-preferensi-makan'))->name('halaman-sebelumnya');
});

// -----------------------------
// ✅ Auth (Login, Register, Email Verification)
// -----------------------------
require __DIR__.'/auth.php';
