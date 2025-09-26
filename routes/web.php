<?php

use Illuminate\Support\Facades\Route;

// Import semua controller yang akan kita gunakan
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfilSekolahController;
use App\Http\Controllers\Dashboard\TutorController;
use App\Http\Controllers\Dashboard\PesertaDidikController;
use App\Http\Controllers\Dashboard\ModulController;
use App\Http\Controllers\Dashboard\DaftarHadirController;
use App\Http\Controllers\Dashboard\SoalUlanganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda mendaftarkan rute web untuk aplikasi Anda.
|
*/

// Rute untuk Halaman Depan (Landing Page)
Route::get('/', [LandingPageController::class, 'index'])->name('landing'); 

// Grup Rute untuk semua halaman Dashboard
// Prefix 'dashboard' akan ditambahkan di depan URL (contoh: /dashboard/modul)
// Name 'dashboard.' akan ditambahkan di depan nama rute (contoh: dashboard.modul.index)
Route::prefix('dashboard')->name('dashboard.')->group(function () {

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