@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manajemen Modul</h2>
    <a href="{{ route('dashboard.modul.create') }}" class="btn btn-primary">Tambah Modul Baru</a>
</div>

@include('partials.alerts')

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Paket</th>
                <th>Kelas</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($moduls as $modul)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $modul->judul }}</td>
                    <td>Paket {{ $modul->paket }}</td>
                    <td>Kelas {{ $modul->kelas }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $modul->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('dashboard.modul.edit', $modul) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.modul.destroy', $modul) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                    <td colspan="6" class="text-center">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $moduls->links() }}
@endsection