<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Biro Kesra Jabar') }}</title>
<link rel="icon" href="data:image/png;base64,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" type="image/webp">
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
                            <a href="{{ route('login') }}">Masuk</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}">Daftar</a>
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
                        <p class="card-text">Menyediakan tampilan bagi admin untuk mengelola data, memantau
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
                <p>arsipkesra@gmail.com</p>
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
                <i> Copyright &copy; Arsip Biro Kesra Jabar 2025</i>
            </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</body>

</html>
