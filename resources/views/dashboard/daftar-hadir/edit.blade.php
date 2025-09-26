@extends('layouts.dashboard')

@section('content')
<h2>Edit File Peserta didik</h2>

@include('partials.alerts')

<form action="{{ route('dashboard.daftar-hadir.update', $daftarhadir) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul File Daftar Hadir</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $daftarhadir->judul) }}" required>
    </div>
    <div class="mb-3">
        <label for="paket" class="form-label">Paket</label>
        <select class="form-select" id="paket" name="paket" required>
            <option value="B" {{ old('paket', $daftarhadir->paket) == 'B' ? 'selected' : '' }}>Paket B</option>
            <option value="C" {{ old('paket', $daftarhadir->paket) == 'C' ? 'selected' : '' }}>Paket C</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="number" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $daftarhadir->kelas) }}" required>
    </div>
    <div class="mb-3">
        <label for="file_pdf" class="form-label">Upload File PDF (Opsional)</label>
        <p>File saat ini: <a href="{{ asset('storage/' . $daftarhadir->file_path) }}" target="_blank">Lihat PDF</a></p>
        <input class="form-control" type="file" id="file_pdf" name="file_pdf" accept=".pdf">
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file.</small>
    </div>
    <a href="{{ route('dashboard.daftar-hadir.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection