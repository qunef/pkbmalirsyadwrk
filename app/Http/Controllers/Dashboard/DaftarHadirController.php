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
        $daftarhadirs = daftarhadir::latest()->paginate(10);
        return view('dashboard.daftar-hadir.index', compact('daftarhadirs')); // Ganti path view
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

        daftarhadir::create($validatedData);

        return redirect()->route('dashboard.daftar-hadir.index')->with('success', 'daftarhadir berhasil diupload.'); 
    }

    public function edit(daftarhadir $daftarhadir)
    {
        return view('dashboard.daftar-hadir.edit', compact('daftarhadir')); 
    }

    public function update(Request $request, daftarhadir $daftarhadir)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($daftarhadir->file_path);
            $filePath = $request->file('file_pdf')->store('pdfs/daftar-hadir', 'public'); 
            $validatedData['file_path'] = $filePath;
        }

        $daftarhadir->update($validatedData);

        return redirect()->route('dashboard.daftar-hadir.index')->with('success', 'File daftarhadir berhasil diperbarui.'); 
    }

    public function destroy(daftarhadir $daftarhadir)
    {
        Storage::disk('public')->delete($daftarhadir->file_path);
        $daftarhadir->delete();
        return redirect()->route('dashboard.daftar-hadir.index')->with('success', 'File daftarhadir berhasil dihapus.'); 
    }
}