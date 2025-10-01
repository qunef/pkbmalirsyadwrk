@extends('layouts.dashboard')

@section('content')
<h2>Edit Peserta Didik</h2>

@include('partials.alerts')

<form action="{{ route('dashboard.peserta-didik.update', $peserta_didik) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="judul" class="form-label">Judul File Peserta Didik</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $peserta_didik->judul) }}" required>
    </div>
    <div class="mb-3">
        <label for="paket" class="form-label">Paket</label>
        <select class="form-select" id="paket" name="paket" required>
            <option value="B" {{ old('paket', $peserta_didik->paket) == 'B' ? 'selected' : '' }}>Paket B</option>
            <option value="C" {{ old('paket', $peserta_didik->paket) == 'C' ? 'selected' : '' }}>Paket C</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="number" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $peserta_didik->kelas) }}" required>
    </div>
    <div class="mb-3">
        <label for="file_pdf" class="form-label">Upload File PDF (Opsional)</label>
        <p>File saat ini: <a href="{{ asset('storage/' . $peserta_didik->file_path) }}" target="_blank">Lihat PDF</a></p>
        <input class="form-control" type="file" id="file_pdf" name="file_pdf" accept=".pdf">
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file.</small>
    </div>
    <a href="{{ route('dashboard.peserta-didik.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection