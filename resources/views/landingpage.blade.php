<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PKBM</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <img src="{{ asset('assets/img/logo.png') }}" class="logo" alt="logo">
                        <h1 class="text-white font-weight-bold">PUSAT KEGIATAN BELAJAR MASYARAKAT (PKBM)</h1><br>
                        <h2 class="text-white font-weight-bold">Yayasan Al-Irsyad</h2>
                        <h5 class="text-white font-weight-bold">Paket B dan C</h5>
                        <h2 class="text-white font-weight-bold">Kelompok Belajar Songgom</h2>
                        
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <a class="btn btn-primary btn-xl" href="#about">Cari tahu lebih lengkap</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Apa itu PKBM?</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">PKBM adalah lembaga pendidikan nonformal yang menyediakan program seperti Kejar Paket A, B, dan C untuk masyarakat yang ingin mendapatkan ijazah setara SD, SMP, dan SMA, meskipun tidak bisa bersekolah di sekolah formal.</p>
                        <a class="btn btn-light btn-xl" href="#services">Mulai Belajar</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Modul</h2>
                <hr class="divider" />
                <div class="isi">
                    <div class="col-lg-8 col-md-7 text-left">
                        <div class="mt-5">
                            <h3 class="h4 mb-2">Profil Sekolah</h3>
                            <table class="text-muted mb-1">
                                <tr>
                                    <td>Nama Sekolah</td>
                                    <td>: PKBM Yayasan Al-Irsyad</td>
                                </tr>
                                <tr>
                                    <td>NPSN</td>
                                    <td>: 20505270</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: Kp. Songgom Ds. Songgom Kec. Gekbrong Kab. Cianjur</td>
                                </tr>
                            </table>
                        </div>
                        <div class="mt-5">
                            <h3 class="h4 mb-2">Tutor</h3>
                            <p class="text-muted mb-1">
                                Nama Tutor : Nita Rismayanti
                            </p>
                        </div>
                        <div class="mt-5">
                            <h3 class="h4 mb-2">Nama Peserta Didik</h3>
                            <div class="d-flex gap-3">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-xl dropdown-toggle" type="button" id="dropdownPaketB" data-bs-toggle="dropdown" aria-expanded="false">
                                        Paket B
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownPaketB">
                                        <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-success btn-xl dropdown-toggle" type="button" id="dropdownPaketC" data-bs-toggle="dropdown" aria-expanded="false">
                                        Paket C
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownPaketC">
                                        <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="h4 mb-2">Modul Pembelajaran</h3>
                            <div class="d-flex gap-3">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-xl dropdown-toggle" type="button" id="dropdownPaketB" data-bs-toggle="dropdown" aria-expanded="false">
                                        Paket B
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownPaketB">
                                        <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-success btn-xl dropdown-toggle" type="button" id="dropdownPaketC" data-bs-toggle="dropdown" aria-expanded="false">
                                        Paket C
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownPaketC">
                                        <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                        <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h3 class="h4 mb-2">Daftar Hadir Peserta Didik</h3>
                                <div class="d-flex gap-3">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-xl dropdown-toggle" type="button" id="dropdownPaketB" data-bs-toggle="dropdown" aria-expanded="false">
                                            Paket B
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownPaketB">
                                            <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-success btn-xl dropdown-toggle" type="button" id="dropdownPaketC" data-bs-toggle="dropdown" aria-expanded="false">
                                            Paket C
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownPaketC">
                                            <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h3 class="h4 mb-2">Soal Ulangan</h3>
                                <div class="d-flex gap-3">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-xl dropdown-toggle" type="button" id="dropdownPaketB" data-bs-toggle="dropdown" aria-expanded="false">
                                            Paket B
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownPaketB">
                                            <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-success btn-xl dropdown-toggle" type="button" id="dropdownPaketC" data-bs-toggle="dropdown" aria-expanded="false">
                                            Paket C
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownPaketC">
                                            <li><a class="dropdown-item" href="#">Kelas 1</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 2</a></li>
                                            <li><a class="dropdown-item" href="#">Kelas 3</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2025 - Yayasan Al-Irsyad</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
