@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manajemen Peserta Didik</h2>
    <a href="{{ route('dashboard.peserta-didik.create') }}" class="btn btn-primary">Tambah File Peserta Didik Baru</a>
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
            @forelse ($pesertadidiks as $pesertadidik)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pesertadidik->judul }}</td>
                    <td>Paket {{ $pesertadidik->paket }}</td>
                    <td>Kelas {{ $pesertadidik->kelas }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $pesertadidik->file_path) }}" target="_blank" class="btn btn-sm btn-info">Lihat PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('dashboard.peserta-didik.edit', $pesertadidik) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.peserta-didik.destroy', $pesertadidik) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
{{ $pesertadidiks->links() }}
@endsection