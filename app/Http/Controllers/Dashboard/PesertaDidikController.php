<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PesertaDidik; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PesertaDidikController extends Controller
{
    public function index()
    {
        $pesertadidiks = PesertaDidik::latest()->paginate(10);
        return view('dashboard.peserta-didik.index', compact('pesertadidiks')); 
    }

    public function create()
    {
        return view('dashboard.peserta-didik.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'required|file|mimes:pdf|max:10240',
        ]);

        $filePath = $request->file('file_pdf')->store('pdfs/peserta-didik', 'public'); 
        $validatedData['file_path'] = $filePath;

        PesertaDidik::create($validatedData);

        return redirect()->route('dashboard.peserta-didik.index')->with('success', 'File Peserta Didik berhasil diupload.'); 
    }

    public function edit(PesertaDidik $pesertadidik)
    {
        return view('dashboard.peserta-didik.edit', compact('pesertadidik')); 
    }

    public function update(Request $request, PesertaDidik $pesertadidik)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($pesertadidik->file_path);
            $filePath = $request->file('file_pdf')->store('pdfs/peserta-didik', 'public'); 
            $validatedData['file_path'] = $filePath;
        }

        $pesertadidik->update($validatedData);

        return redirect()->route('dashboard.peserta-didik.index')->with('success', 'File Peserta Didik berhasil diperbarui.'); 
    }

    public function destroy(PesertaDidik $pesertadidik)
    {
        Storage::disk('public')->delete($pesertadidik->file_path);
        $pesertadidik->delete();
        return redirect()->route('dashboard.peserta-didik.index')->with('success', 'File Peserta Didik berhasil dihapus.'); 
    }
}