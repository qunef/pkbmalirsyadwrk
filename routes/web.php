<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfilSekolahController;
use App\Http\Controllers\Dashboard\TutorController;
use App\Http\Controllers\Dashboard\PesertaDidikController;
use App\Http\Controllers\Dashboard\ModulController;
use App\Http\Controllers\Dashboard\DaftarHadirController;
use App\Http\Controllers\Dashboard\SoalUlanganController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing'); 

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

    // Rute utama dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Rute untuk Profil Sekolah (hanya edit dan update)
    Route::get('profil-sekolah', [ProfilSekolahController::class, 'edit'])->name('profil-sekolah.edit');
    Route::put('profil-sekolah', [ProfilSekolahController::class, 'update'])->name('profil-sekolah.update');

    // Rute Resource untuk manajemen data (otomatis membuat 7 rute CRUD)
    Route::resource('tutor', TutorController::class);
    Route::resource('peserta-didik', PesertaDidikController::class);
    Route::resource('modul', ModulController::class);
    Route::resource('daftar-hadir', DaftarHadirController::class);
    Route::resource('soal-ulangan', SoalUlanganController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use Illuminate\Support\Facades\DB;

Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Selamat! Koneksi ke database berhasil dibuat.";
    } catch (\Exception $e) {
        die("Gagal terhubung ke database. Pesan error: " . $e->getMessage());
    }
});

