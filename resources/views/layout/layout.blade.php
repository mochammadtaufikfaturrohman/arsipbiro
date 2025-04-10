<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
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
                @include('layout.navbar')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Penataan Arsip Biro Kesra Jabar</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- card -->
                        @if (Auth()->user()->role == 'admin')
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Admin</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
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
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Dokumen</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">215</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Total Divisi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                @elseif (Auth()->user()->role == 'user')
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Dokumen</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">215</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-file-alt fa-2x text-gray-300"></i>
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
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total Divisi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Content Table -->
                <div class="col-lg-15">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-10 font-weight-bold text-primary">Dokumen Semua Divisi</h6>
                            <div class="d-flex gap-2 mt-3">
                                <select id="filterKategori" class="form-control" style="width: 160px;">
                                    <option value="">Semua Kategori</option>
                                    <option value="arsip dinamis">Arsip Dinamis</option>
                                    <option value="arsip statis">Arsip Statis</option>
                                    <option value="arsip dinamis">Arsip Vital</option>
                                    <option value="arsip statis">Arsip Permanen</option>
                                    <option value="arsip dinamis">Arsip Retensi Jangka Pendek</option>
                                    <option value="arsip statis">Arsip Retensi Jangka Panjang</option>
                                    <option value="arsip dinamis">Arsip Elektronik</option>
                                    <option value="arsip statis">Arsip Fisik</option>
                                </select>
                                <form
                                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-white border-0 small"
                                            placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button"><i
                                                    class="fas fa-search fa-sm"></i></button>
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
                                        <th>Kategori</th>
                                        <th>Dokumen</th>
                                        {{-- @if (Auth()->user()->role == 'admin')
                                        <th>Aksi</th>
                                        @endif --}}
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
                                                <td>{{ $item->Kategori }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Unduh Dokumen"><i class="fas fa-download"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                        @php
                                            $totalData = count($tu) + count($yandas) + count($bms) + count($npd ?? []);
                                        @endphp
                                    
                                        @if ($totalData > 0)
                                            @foreach (['tu' => $tu, 'yandas' => $yandas, 'bms' => $bms, 'npd' => $npd ?? []] as $title => $data)
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $item->No_Arsip }}</td>
                                                        <td>{{ $item->Nama_Lembaga }}</td>
                                                        <td>{{ $item->Tanggal }}</td>
                                                        <td>{{ $item->Kegiatan }}</td>
                                                        <td>{{ $item->Keterangan }}</td>
                                                        <td>{{ $item->Kategori }}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-sm" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                                            <a href="#" class="btn btn-primary btn-sm" title="Unduh Dokumen"><i class="fas fa-download"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endif
                                </tbody>
                            </table>
                            {{ $tu->links() }}
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

</body>

</html>
