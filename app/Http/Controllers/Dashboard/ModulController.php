<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Modul; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ModulController extends Controller
{
    public function index()
    {
        $moduls = Modul::latest()->paginate(10);
        return view('dashboard.modul.index', compact('moduls')); // Ganti path view
    }

    public function create()
    {
        return view('dashboard.modul.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'required|file|mimes:pdf|max:10240',
        ]);

        $filePath = $request->file('file_pdf')->store('pdfs/modul', 'public'); 
        $validatedData['file_path'] = $filePath;

        Modul::create($validatedData);

        return redirect()->route('dashboard.modul.index')->with('success', 'Modul berhasil diupload.'); 
    }

    public function edit(Modul $modul)
    {
        return view('dashboard.modul.edit', compact('modul')); 
    }

    public function update(Request $request, Modul $modul)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'paket' => ['required', Rule::in(['B', 'C'])],
            'kelas' => 'required|integer|min:1',
            'file_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($modul->file_path);
            $filePath = $request->file('file_pdf')->store('pdfs/modul', 'public'); 
            $validatedData['file_path'] = $filePath;
        }

        $modul->update($validatedData);

        return redirect()->route('dashboard.modul.index')->with('success', 'File Modul berhasil diperbarui.'); 
    }

    public function destroy(Modul $modul)
    {
        Storage::disk('public')->delete($modul->file_path);
        $modul->delete();
        return redirect()->route('dashboard.modul.index')->with('success', 'File Modul berhasil dihapus.'); 
    }
}