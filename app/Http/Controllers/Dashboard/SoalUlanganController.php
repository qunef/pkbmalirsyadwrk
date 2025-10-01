<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SoalUlangan; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SoalUlanganController extends Controller
{
    public function index()
    {
        $soalulangans = SoalUlangan::latest()->paginate(10);
        return view('dashboard.soal-ulangan.index', compact('soalulangans')); 
    }

    public function create()
    {
        return view('dashboard.soal-ulangan.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'required|file|mimes:pdf|max:10240',
        ]);

        $filePath = $request->file('file_pdf')->store('pdfs/soal-ulangan', 'public'); 
        $validatedData['file_path'] = $filePath;

        soalulangan::create($validatedData);

        return redirect()->route('dashboard.soal-ulangan.index')->with('success', 'File Soal Ulangan berhasil diupload.'); 
    }

    public function edit(SoalUlangan $soalulangan)
    {
        return view('dashboard.soal-ulangan.edit', compact('soalulangan')); 
    }

    public function update(Request $request, SoalUlangan $soal_ulangan)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($soalulangan->file_path);
            $filePath = $request->file('file_pdf')->store('pdfs/soal-ulangan', 'public'); 
            $validatedData['file_path'] = $filePath;
        }

        $soalulangan->update($validatedData);

        return redirect()->route('dashboard.soal-ulangan.index')->with('success', 'File Soal Ulangan berhasil diperbarui.'); 
    }

    public function destroy(SoalUlangan $soal_ulangan)
    {
        Storage::disk('public')->delete($soal_ulangan->file_path);
        $soal_ulangan->delete();
        return redirect()->route('dashboard.soal-ulangan.index')->with('success', 'File Soal Ulangan berhasil dihapus.'); 
    }
}