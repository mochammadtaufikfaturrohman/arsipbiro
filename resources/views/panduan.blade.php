<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panduan Arsip</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fi
    <link rel="icon" href="..."
        type="image/webp"> <!-- (Gunakan base64 asli Anda di sini) -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layout.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Notifikasi -->
                <div class="bg-danger text-light py-10 px-15">
                    <marquee behavior="scroll" direction="left" scrollamount="5">
                        🔔 <strong>Pemberitahuan:</strong> Silakan baca halaman ini terlebih dahulu untuk mengetahui
                        jenis-jenis arsip yang tersedia.
                    </marquee>
                </div>

                @include('layout.navbar')

                <div class="container-fluid">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pengantar</h1>
                        <p class="mt-3">
                            Sistem Arsip Digital ini dirancang untuk membantu instansi dalam mengelola dokumen secara
                            efisien dan terstruktur. Setiap dokumen perlu diklasifikasikan berdasarkan kategori yang
                            telah ditentukan agar proses pencarian dan pengelolaan menjadi lebih mudah.
                        </p>
                        <p>
                            Panduan ini berisi penjelasan mengenai kategori arsip, contoh dokumen untuk setiap kategori,
                            serta langkah-langkah penginputan yang benar.
                        </p>
                    </div>

                    <div class="row">
                        @php
                            $arsipList = [
                                [
                                    'title' => 'Arsip Dinamis',
                                    'desc' =>
                                        'Digunakan secara langsung dalam kegiatan sehari-hari dan memiliki nilai guna administrasi.',
                                    'slug' => 'dinamis',
                                    'image' => 'dinamis.jpg',
                                ],
                                [
                                    'title' => 'Arsip Statis',
                                    'desc' =>
                                        'Tidak aktif digunakan lagi, namun memiliki nilai sejarah dan disimpan permanen.',
                                    'slug' => 'statis',
                                    'image' => 'statis.jpg',
                                ],
                                [
                                    'title' => 'Arsip Vital',
                                    'desc' =>
                                        'Sangat penting bagi keberlangsungan organisasi dan harus dilindungi dari kerusakan atau kehilangan.',
                                    'slug' => 'vital',
                                    'image' => 'vital.jpg',
                                ],
                                [
                                    'title' => 'Arsip Permanen',
                                    'desc' =>
                                        'Disimpan untuk jangka waktu tidak terbatas karena memiliki nilai hukum, sejarah, atau budaya.',
                                    'slug' => 'permanen',
                                    'image' => 'permanen.jpg',
                                ],
                                [
                                    'title' => 'Arsip Fisik',
                                    'desc' => 'Berbentuk kertas atau dokumen cetak yang memerlukan penyimpanan manual.',
                                    'slug' => 'fisik',
                                    'image' => 'fisik.jpg',
                                ],
                                [
                                    'title' => 'Arsip Retensi Jangka Pendek',
                                    'desc' =>
                                        'Hanya disimpan dalam periode waktu pendek, biasanya kurang dari 5 tahun.',
                                    'slug' => 'retensi-pendek',
                                    'image' => 'pendek.jpg',
                                ],
                                [
                                    'title' => 'Arsip Retensi Jangka Panjang',
                                    'desc' =>
                                        'Disimpan untuk waktu lebih dari 5 tahun sebelum dimusnahkan atau dipindahkan.',
                                    'slug' => 'retensi-panjang',
                                    'image' => 'panjang.jpg',
                                ],
                                [
                                    'title' => 'Arsip Elektronik',
                                    'desc' => 'Berbentuk digital dan tersimpan dalam sistem komputerisasi.',
                                    'slug' => 'elektronik',
                                    'image' => 'elektronik.jpg',
                                ],
                            ];
                        @endphp

                        {{-- content arsip --}}
                        @foreach ($arsipList as $arsip)
                            <div class="col-md-4">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-2">
                                        <h6 class="m-0 font-weight-bold text-primary">{{ $arsip['title'] }}</h6>
                                    </div>
                                    <img src="{{ asset('template/img/' . $arsip['image']) }}" class="card-img-top"
                                        alt="Gambar {{ $arsip['title'] }}">

                                    <div class="card-body">
                                        <p class="text-justify text-sm">
                                            {{ $arsip['desc'] }}
                                        </p>
                                        <a href="{{ route('arsip.detail', ['jenis' => $arsip['slug']]) }}"
                                            class="btn btn-primary">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @include('layout.footer')
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Script JS -->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>
</body>
</html>
