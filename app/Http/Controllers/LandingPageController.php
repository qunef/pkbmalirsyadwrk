<?php

namespace App\Http\Controllers;

// Import semua Model yang kita butuhkan
use App\Models\ProfilSekolah;
use App\Models\Tutor;
use App\Models\PesertaDidik;
use App\Models\Modul;
use App\Models\DaftarHadir;
use App\Models\SoalUlangan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Data Profil dan Tutor
        $profil = ProfilSekolah::first();
        $tutor = Tutor::first();

        // Ambil 1 data Peserta Didik TERBARU untuk setiap kelas
        $siswaB1 = PesertaDidik::where('paket', 'B')->where('kelas', 1)->latest()->first();
        $siswaB2 = PesertaDidik::where('paket', 'B')->where('kelas', 2)->latest()->first();
        $siswaB3 = PesertaDidik::where('paket', 'B')->where('kelas', 3)->latest()->first();
        $siswaC1 = PesertaDidik::where('paket', 'C')->where('kelas', 1)->latest()->first();
        $siswaC2 = PesertaDidik::where('paket', 'C')->where('kelas', 2)->latest()->first();
        $siswaC3 = PesertaDidik::where('paket', 'C')->where('kelas', 3)->latest()->first();

        // Ambil 1 data Modul TERBARU untuk setiap kelas
        $modulB1 = Modul::where('paket', 'B')->where('kelas', 1)->latest()->first();
        $modulB2 = Modul::where('paket', 'B')->where('kelas', 2)->latest()->first();
        $modulB3 = Modul::where('paket', 'B')->where('kelas', 3)->latest()->first();
        $modulC1 = Modul::where('paket', 'C')->where('kelas', 1)->latest()->first();
        $modulC2 = Modul::where('paket', 'C')->where('kelas', 2)->latest()->first();
        $modulC3 = Modul::where('paket', 'C')->where('kelas', 3)->latest()->first();

        // Ambil 1 data Daftar Hadir TERBARU untuk setiap kelas
        $hadirB1 = DaftarHadir::where('paket', 'B')->where('kelas', 1)->latest()->first();
        $hadirB2 = DaftarHadir::where('paket', 'B')->where('kelas', 2)->latest()->first();
        $hadirB3 = DaftarHadir::where('paket', 'B')->where('kelas', 3)->latest()->first();
        $hadirC1 = DaftarHadir::where('paket', 'C')->where('kelas', 1)->latest()->first();
        $hadirC2 = DaftarHadir::where('paket', 'C')->where('kelas', 2)->latest()->first();
        $hadirC3 = DaftarHadir::where('paket', 'C')->where('kelas', 3)->latest()->first();

        // Ambil 1 data Soal Ulangan TERBARU untuk setiap kelas
        $soalB1 = SoalUlangan::where('paket', 'B')->where('kelas', 1)->latest()->first();
        $soalB2 = SoalUlangan::where('paket', 'B')->where('kelas', 2)->latest()->first();
        $soalB3 = SoalUlangan::where('paket', 'B')->where('kelas', 3)->latest()->first();
        $soalC1 = SoalUlangan::where('paket', 'C')->where('kelas', 1)->latest()->first();
        $soalC2 = SoalUlangan::where('paket', 'C')->where('kelas', 2)->latest()->first();
        $soalC3 = SoalUlangan::where('paket', 'C')->where('kelas', 3)->latest()->first();

        // Kirim semua data ke view
        return view('landingpage', compact(
            'profil', 'tutor',
            'siswaB1', 'siswaB2', 'siswaB3', 'siswaC1', 'siswaC2', 'siswaC3',
            'modulB1', 'modulB2', 'modulB3', 'modulC1', 'modulC2', 'modulC3',
            'hadirB1', 'hadirB2', 'hadirB3', 'hadirC1', 'hadirC2', 'hadirC3',
            'soalB1', 'soalB2', 'soalB3', 'soalC1', 'soalC2', 'soalC3'
        ));
    }
}