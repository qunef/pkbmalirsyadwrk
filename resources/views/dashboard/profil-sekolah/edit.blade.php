@extends('layouts.dashboard')

@section('content')
<h2>Manajemen Profil Sekolah</h2>
<p class="text-muted">Perbarui informasi mengenai profil sekolah Anda di sini.</p>

@include('partials.alerts')

<div class="card mt-4">
    <div class="card-body">
        <form action="{{ route('dashboard.profil-sekolah.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah', $profil->nama_sekolah) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="npsn" class="form-label">NPSN</label>
                <input type="text" class="form-control" id="npsn" name="npsn" value="{{ old('npsn', $profil->npsn) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $profil->alamat) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Profil Sekolah</button>
        </form>
    </div>
</div>
@endsection