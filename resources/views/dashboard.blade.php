<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link rel="icon"
        href="data:image/png;base64,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"
        type="image/webp">
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <div class="bg-danger text-light py-10 px-15">
                    <marquee behavior="scroll" direction="left" scrollamount="5">
                        <strong>🔔 Pemberitahuan:</strong> Silakan baca halaman <a href="{{ route('dashboard') }}" class="text-light font-weight-bold">Panduan Arsip</a> terlebih dahulu untuk mengetahui jenis-jenis arsip yang tersedia.
                    </marquee>
                </div>
                @include('layout.navbar')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Dashboard Penataan Arsip Biro Kesra Jabar</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Arsip TU</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTu }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Arsip Yandas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalYandas }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Arsip NPD</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalNpd }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Arsip BMS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBms }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Table -->
                    <div class="col-lg-15">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h6 class="m-10 font-weight-bold text-primary">Dokumen Semua Divisi</h6>
                                <div class="d-flex gap-2 mt-3">
                                    <form action="{{ route('dashboard.filter') }}" method="GET" id="filterForm"
                                        class="d-none d-md-flex">
                                        <select name="kategori" id="filterKategori" class="form-control"
                                            style="width: 160px;"
                                            onchange="document.getElementById('filterForm').submit();">
                                            <option value="">Pilih Kategori</option>
                                            <option value="arsip dinamis"
                                                {{ request('kategori') == 'arsip dinamis' ? 'selected' : '' }}>Arsip
                                                Dinamis</option>
                                            <option value="arsip statis"
                                                {{ request('kategori') == 'arsip statis' ? 'selected' : '' }}>Arsip
                                                Statis</option>
                                            <option value="arsip vital"
                                                {{ request('kategori') == 'arsip vital' ? 'selected' : '' }}>Arsip Vital
                                            </option>
                                            <option value="arsip permanen"
                                                {{ request('kategori') == 'arsip permanen' ? 'selected' : '' }}>Arsip
                                                Permanen</option>
                                            <option value="arsip retensi jangka pendek"
                                                {{ request('kategori') == 'arsip retensi jangka pendek' ? 'selected' : '' }}>
                                                Arsip Retensi Jangka Pendek</option>
                                            <option value="arsip retensi jangka panjang"
                                                {{ request('kategori') == 'arsip retensi jangka panjang' ? 'selected' : '' }}>
                                                Arsip Retensi Jangka Panjang</option>
                                            <option value="arsip elektronik"
                                                {{ request('kategori') == 'arsip elektronik' ? 'selected' : '' }}>Arsip
                                                Elektronik</option>
                                            <option value="arsip fisik"
                                                {{ request('kategori') == 'arsip fisik' ? 'selected' : '' }}>Arsip
                                                Fisik</option>
                                        </select>
                                        <select name="divisi" id="filterDivisi" class="form-control ml-2"
                                            style="width: 160px;"
                                            onchange="document.getElementById('filterForm').submit();">
                                            <option value="">Pilih Divisi</option>
                                            <option value="Sosial" {{ request('divisi') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                            <option value="Kesehatan" {{ request('divisi') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                            <option value="Pendidikan" {{ request('divisi') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                            <option value="NPD 1" {{ request('divisi') == 'NPD 1' ? 'selected' : '' }}>NPD 1</option>
                                            <option value="NPD 2" {{ request('divisi') == 'NPD 2' ? 'selected' : '' }}>NPD 2</option>
                                            <option value="NPD 3" {{ request('divisi') == 'NPD 3' ? 'selected' : '' }}>NPD 3</option>
                                            <option value="Kelembagaan" {{ request('divisi') == 'Kelembagaan' ? 'selected' : '' }}>Kelembagaan</option>
                                            <option value="Sarana Prasarana" {{ request('divisi') == 'Sarana Prasarana' ? 'selected' : '' }}>Sarana Prasarana</option>
                                        </select>
                                        <div class="input-group">
                                            <input type="text" name="query" class="form-control ml-2"  placeholder="Search for..." value="{{ request('query') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No Arsip</th>
                                            <th>Nama Lembaga</th>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Keterangan</th>
                                            <th>Divisi</th>
                                            <th>Kategori</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (['tu' => $tu, 'yandas' => $yandas, 'bms' => $bms, 'npd' => $npd ?? []] as $title => $data)
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->No_Arsip }}</td>
                                                    <td>{{ $item->Nama_Lembaga }}</td>
                                                    <td>{{ $item->Tanggal }}</td>
                                                    <td>{{ $item->Kegiatan }}</td>
                                                    <td>{{ $item->Keterangan }}</td>
                                                    <td>{{ $item->Divisi }}</td>
                                                    {{-- <td>{{ $item->Divisi }}</td> --}}
                                                    {{-- <td>{{ $item->Kategori }}</td> --}}
                                                    <td>{{ $item->Kategori }}</td>

                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                    {{-- end content table --}}



                    <div class="row">
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            @include('layout.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>

        <script>
            function filterKategori() {
                const kategori = document.getElementById('filterKategori').value;
                const url = "{{ route('dashboard.filter') }}";
                window.location.href = `${url}?kategori=${kategori}`;
            }
        </script>

</body>

</html>
