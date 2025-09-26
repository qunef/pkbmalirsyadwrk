@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manajemen Tutor</h2>
    <a href="{{ route('dashboard.tutor.create') }}" class="btn btn-primary">Tambah Tutor Baru</a>
</div>

@include('partials.alerts')

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Tutor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tutors as $tutor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tutor->nama_tutor }}</td>
                    <td>
                        <a href="{{ route('dashboard.tutor.edit', $tutor) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.tutor.destroy', $tutor) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data tutor.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Tampilkan link paginasi --}}
{{ $tutors->links() }}
@endsection