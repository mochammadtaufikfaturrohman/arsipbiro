<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Biro Kesra Jabar') }}</title>
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<!-- Fonts -->
<link rel="stylesheet" href="css/style.css">
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar">
        <img src="https://d2s1u1uyrl4yfi.cloudfront.net/birokesra/wysiwyg/26b607be1faf7d4ced6bd140956a5a1a.webp"
            alt="Logo kesra jabar" class="logo">
        <div class="buttons">
            <ul>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
    {{-- akhir navbar --}}
    {{-- awal konten --}}
    <section>
        <div class="overlay">
            <div class="content">
                <h1>Selamat Datang di Penataan Arsip Biro Kesejahteraan Rakyat Provinsi Jawa Barat</h1>
            </div>
        </div>
    </section>
    <section class="about-section">
        <h2>Apa Itu E-Arsip?</h2>
        <div class="about">
            <div class="about-image">
                <img src="https://img.freepik.com/free-vector/add-files-concept-illustration_114360-5399.jpg?ga=GA1.1.1347691071.1735566400&semt=ais_hybrid&w=740"
                    alt="Ilustrasi E-Arsip">
            </div>
            <div class="about-text">
                <p>E-Arsip adalah sistem digital yang dirancang untuk menyimpan, mengelola, dan mengakses arsip secara
                    elektronik. Dengan teknologi ini, pengguna dapat mengunggah dokumen penting, mengatur kategori
                    arsip, serta mencari dokumen dengan cepat dan efisien.</p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h2>Tujuan E-Arsip</h2>
            <div class="card-group">
                <div class="card">
                    <img src="https://img.freepik.com/free-vector/transfer-files-concept-illustration_114360-5838.jpg?ga=GA1.1.1347691071.1735566400&semt=ais_hybrid&w=740"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Akses dokumen menjadi lebih cepat dan efisien, karena e-Arsip memungkinkan
                            pencarian dan pembukaan file hanya dengan beberapa klik.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://img.freepik.com/free-vector/stock-exchange-data-concept_23-2148583923.jpg?ga=GA1.1.1347691071.1735566400&semt=ais_hybrid&w=740"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">E-Arsip menghemat ruang penyimpanan fisik karena dokumen disimpan secara
                            digital, memudahkan organisasi dalam mengelola volume besar arsip.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://img.freepik.com/free-vector/global-data-security-personal-data-security-cyber-data-security-online-concept-illustration-internet-security-information-privacy-protection_1150-37375.jpg?ga=GA1.1.1347691071.1735566400&semt=ais_hybrid&w=740"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Keamanan arsip meningkat dengan adanya fitur enkripsi dan hak akses,
                            sehingga hanya pihak tertentu yang dapat membuka dokumen.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="fitur">
            <h2>Fitur E-Arsip</h2>
            <div class="card-group">
                <div class="card-filter">
                    <img src="{{ asset('template/img/gambar 1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> Login & Logout</h5>
                        <p class="card-text">Fitur Login & Logout memungkinkan pengguna untuk masuk ke dalam sistem
                            secara aman dan keluar saat telah selesai menggunakan layanan.</p>
                    </div>
                </div>
                <div class="card-filter">
                    <img src="{{ asset('template/img/gambar 2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CRUD Arsip</h5>
                        <p class="card-text">Fitur CRUD Arsip memungkinkan administrator untuk membuat, melihat,
                            memperbarui, dan menghapus data arsip secara efisien.</p>
                    </div>
                </div>
                <div class="card-filter">
                    <img src="{{ asset('template/img/gambar 3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">CRUD Admin</h5>
                        <p class="card-text">Fitur CRUD Admin memungkinkan administrator untuk membuat akun admin baru
                            dalam sistem manajemen arsip.</p>
                    </div>
                </div>
                <div class="card-filter">
                    <img src="{{ asset('template/img/gambar 4.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dashboard Admin</h5>
                        <p class="card-text">Menyediakan tampilan terpusat bagi admin untuk mengelola data, memantau
                            aktivitas pengguna, dan mengatur konten sistem secara efisien.</p>
                    </div>
                </div>
                <div class="card-filter">
                    <img src="{{ asset('template/img/gambar 5.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dashborad User</h5>
                        <p class="card-text">Menyajikan informasi personal dan akses untuk melihat arsip yang telah
                            diunggah tanpa fitur interaktif tambahan.</p>
                    </div>
                </div>
                <div class="card-filter">
                    <img src="{{ asset('template/img/gambar 6.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text">Menampilkan data diri pengguna yang dapat dilihat dan diperbarui untuk
                            memastikan informasi tetap akurat dan terkini.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- akhir konten --}}
    <footer class="footer">
        <div class="footer-container">
            <!-- Alamat -->
            <div class="footer-item">
                <h4><i class="fa fa-map-marker-alt"></i> Alamat</h4>
                <p>Jl. Diponegoro No.22, Citarum, Kec. Bandung<br>
                    Wetan, Kota Bandung, Jawa Barat 40115</p>
            </div>

            <!-- Email -->
            <div class="footer-item">
                <h4><i class="fas fa-envelope"></i> Email</h4>
                <p>birokesra@jabarprov.go.id</p>
            </div>

            <!-- Telepon -->
            <div class="footer-item">
                <h4><i class="fas fa-phone"></i> Nomor Telepon</h4>
                <p>0224232448</p>
            </div>

            <!-- Sosial Media -->
            <div class="footer-item">
                <h4><i class="fas fa-globe"></i> Sosial Media</h4>
                <div class="social-icons">
                    <a href="https://www.facebook.com/birokesrajabar"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/birokesrajabar"><i class="fab fa-instagram"></i></a>
                    <a href="https://x.com/Birokesrajabar?t=363D1kaWtyo8ol_ZKhkAQg&s=09"><i
                            class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UCDkE835qNrFOCO6w6ZO2B4A"><i
                            class="fab fa-youtube"></i></a>
                    <a href="https://www.tiktok.com/@birokesrajabar"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <hr>
            <!-- Copyright -->
            <div class="footer-bottom">
                <i>&copy; 2023 Biro Kesra Jabar. Semua hak dilindungi.</i>
            </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</body>

</html>
