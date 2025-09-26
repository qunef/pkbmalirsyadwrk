@extends('layouts.dashboard')

@section('content')
<h2>Edit Tutor</h2>

@include('partials.alerts')

<form action="{{ route('dashboard.tutor.update', $tutor) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_tutor" class="form-label">Nama Tutor</label>
        <input type="text" class="form-control" id="nama_tutor" name="nama_tutor" value="{{ old('nama_tutor', $tutor->nama_tutor) }}" required>
    </div>
    <a href="{{ route('dashboard.tutor.index') }}" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection