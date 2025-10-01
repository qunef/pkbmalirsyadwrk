<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DaftarHadir; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DaftarHadirController extends Controller
{
    public function index()
    {
        $daftarhadirs = DaftarHadir::latest()->paginate(10); 
        return view('dashboard.daftar-hadir.index', compact('daftarhadirs'));
    }

    public function create()
    {
        return view('dashboard.daftar-hadir.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'required|file|mimes:pdf|max:10240',
        ]);

        $filePath = $request->file('file_pdf')->store('pdfs/daftar-hadir', 'public'); 
        $validatedData['file_path'] = $filePath;

        DaftarHadir::create($validatedData); // Fixed: DaftarHadir dengan huruf kapital

        return redirect()->route('dashboard.daftar-hadir.index')->with('success', 'Daftar hadir berhasil diupload.'); 
    }

    public function edit(DaftarHadir $daftar_hadir) // Fixed: DaftarHadir dengan huruf kapital
    {
        return view('dashboard.daftar-hadir.edit', compact('daftar_hadir')); 
    }

    public function update(Request $request, DaftarHadir $daftar_hadir) // Fixed: DaftarHadir dengan huruf kapital
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($daftar_hadir->file_path);
            $filePath = $request->file('file_pdf')->store('pdfs/daftar-hadir', 'public'); 
            $validatedData['file_path'] = $filePath;
        }

        $daftar_hadir->update($validatedData);

        return redirect()->route('dashboard.daftar-hadir.index')->with('success', 'File daftar hadir berhasil diperbarui.'); 
    }

    public function destroy(DaftarHadir $daftar_hadir) 
    {
        Storage::disk('public')->delete($daftar_hadir->file_path);
        $daftar_hadir->delete();
        return redirect()->route('dashboard.daftar-hadir.index')->with('success', 'File daftar hadir berhasil dihapus.'); 
    }
}