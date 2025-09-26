@extends('layouts.dashboard')

@section('content')
<h2>Edit File Peserta didik</h2>

@include('partials.alerts')

<form action="{{ route('dashboard.soal-ulangan.update', $soalulangan) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul File Soal Ulangan</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $soalulangan->judul) }}" required>
    </div>
    <div class="mb-3">
        <label for="paket" class="form-label">Paket</label>
        <select class="form-select" id="paket" name="paket" required>
            <option value="B" {{ old('paket', $soalulangan->paket) == 'B' ? 'selected' : '' }}>Paket B</option>
            <option value="C" {{ old('paket', $soalulangan->paket) == 'C' ? 'selected' : '' }}>Paket C</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="number" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $soalulangan->kelas) }}" required>
    </div>
    <div class="mb-3">
        <label for="file_pdf" class="form-label">Upload File PDF (Opsional)</label>
        <p>File saat ini: <a href="{{ asset('storage/' . $soalulangan->file_path) }}" target="_blank">Lihat PDF</a></p>
        <input class="form-control" type="file" id="file_pdf" name="file_pdf" accept=".pdf">
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file.</small>
    </div>
    <a href="{{ route('dashboard.soal-ulangan.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection