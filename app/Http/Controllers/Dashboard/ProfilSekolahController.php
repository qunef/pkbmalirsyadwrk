<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function edit()
    {
        // Ambil data pertama, atau buat baru jika tidak ada
        $profil = ProfilSekolah::firstOrCreate(
            ['id' => 1], // Kunci untuk mencari
            [ // Data default jika tidak ditemukan
                'nama_sekolah' => 'Nama Sekolah Anda',
                'npsn' => '12345678',
                'alamat' => 'Alamat Sekolah Anda'
            ]
        );
        return view('dashboard.profil-sekolah.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        // Cari data dengan id=1, lalu update
        $profil = ProfilSekolah::find(1);
        $profil->update($validatedData);

        return redirect()->route('dashboard.profil-sekolah.edit')->with('success', 'Profil Sekolah berhasil diperbarui.');
    }
}