<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PKBM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { display: flex; }
        .sidebar { width: 250px; min-height: 100vh; background-color: #343a40; }
        .content { flex-grow: 1; padding: 30px; }
    </style>
    <link rel="icon" type="image/jpg" href="{{ asset('assets/img/logo.jpg') }}">
</head>
<body>
    <div class="sidebar p-3 text-white">
        <h4>Dashboard PKBM</h4>
        <hr class="text-white">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard.profil-sekolah.*') ? 'active' : '' }}" href="{{ route('dashboard.profil-sekolah.edit') }}">Profil Sekolah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard.tutor.*') ? 'active' : '' }}" href="{{ route('dashboard.tutor.index') }}">Manajemen Tutor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard.peserta-didik.*') ? 'active' : '' }}" href="{{ route('dashboard.peserta-didik.index') }}">Daftar Peserta Didik</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard.modul.*') ? 'active' : '' }}" href="{{ route('dashboard.modul.index') }}">Modul Pembelajaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard.daftar-hadir.*') ? 'active' : '' }}" href="{{ route('dashboard.daftar-hadir.index') }}">Daftar Hadir</a>
            </li>
             <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard.soal-ulangan.*') ? 'active' : '' }}" href="{{ route('dashboard.soal-ulangan.index') }}">Soal Ulangan</a>
            </li>
            <li class="nav-item mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" 
                    class="nav-link text-danger" 
                    onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>
            </li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>