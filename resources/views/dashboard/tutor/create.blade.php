@extends('layouts.dashboard')

@section('content')
<h2>Tambah Tutor Baru</h2>

@include('partials.alerts')

<form action="{{ route('dashboard.tutor.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_tutor" class="form-label">Nama Tutor</label>
        <input type="text" class="form-control" id="nama_tutor" name="nama_tutor" value="{{ old('nama_tutor') }}" required>
    </div>
    <a href="{{ route('dashboard.tutor.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection