@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manajemen Daftar Hadir</h2>
    <a href="{{ route('dashboard.daftar-hadir.create') }}" class="btn btn-primary">Tambah File Daftar Hadir</a>
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
            @forelse ($daftarhadirs as $daftarhadir)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $daftarhadir->judul }}</td>
                    <td>Paket {{ $daftarhadir->paket }}</td>
                    <td>Kelas {{ $daftarhadir->kelas }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $daftarhadir->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('dashboard.daftar-hadir.edit', $daftarhadir) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.daftar-hadir.destroy', $daftarhadir) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
{{ $daftarhadirs->links() }}
@endsection