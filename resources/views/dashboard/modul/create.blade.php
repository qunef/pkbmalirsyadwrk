@extends('layouts.dashboard')

@section('content')
<h2>Tambah File Modul Baru</h2>

@include('partials.alerts')

<form action="{{ route('dashboard.modul.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="judul" class="form-label">Judul Modul</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
    </div>
    <div class="mb-3">
        <label for="paket" class="form-label">Paket</label>
        <select class="form-select" id="paket" name="paket" required>
            <option value="B" {{ old('paket') == 'B' ? 'selected' : '' }}>Paket B</option>
            <option value="C" {{ old('paket') == 'C' ? 'selected' : '' }}>Paket C</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="number" class="form-control" id="kelas" name="kelas" value="{{ old('kelas') }}" required>
    </div>
    <div class="mb-3">
        <label for="file_pdf" class="form-label">Upload File PDF</label>
        <input class="form-control" type="file" id="file_pdf" name="file_pdf" required accept=".pdf">
    </div>
    <a href="{{ route('dashboard.modul.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection