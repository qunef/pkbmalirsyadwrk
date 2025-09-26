<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::latest()->paginate(10);
        return view('dashboard.tutor.index', compact('tutors'));
    }

    public function create()
    {
        return view('dashboard.tutor.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(['nama_tutor' => 'required|string|max:255']);
        Tutor::create($validatedData);
        return redirect()->route('dashboard.tutor.index')->with('success', 'Tutor berhasil ditambahkan.');
    }

    public function edit(Tutor $tutor)
    {
        return view('dashboard.tutor.edit', compact('tutor'));
    }

    public function update(Request $request, Tutor $tutor)
    {
        $validatedData = $request->validate(['nama_tutor' => 'required|string|max:255']);
        $tutor->update($validatedData);
        return redirect()->route('dashboard.tutor.index')->with('success', 'Tutor berhasil diperbarui.');
    }

    public function destroy(Tutor $tutor)
    {
        $tutor->delete();
        return redirect()->route('dashboard.tutor.index')->with('success', 'Tutor berhasil dihapus.');
    }
}