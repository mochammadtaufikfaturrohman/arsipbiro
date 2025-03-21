<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arsip Tata Usaha</title>
    <link rel="icon" href="template/img/jabar.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheets -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include ('layout.sidebar')
        <!-- End Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                @include ('layout.navbar')
                <!-- End Topbar -->

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tata Usaha</h1>
                    <p class="mb-4">TU bertanggung jawab memastikan kelancaran operasional kantor dengan menangani
                        segala bentuk korespondensi, pencatatan dokumen resmi, serta pendistribusian informasi kepada
                        pihak-pihak terkait.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dokumen Tata Usaha</h6>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="mb-4 table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Arsip</th>
                                            <th>Nama Lembaga</th>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Keterangan</th>
                                            <th>Kategori</th>
                                            <th>Dokumen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($tu) && $tu->count() > 0)
                                            @foreach ($tu as $item)
                                                <tr>
                                                    <td>{{ $item->No_Arsip }}</td>
                                                    <td>{{ $item->Nama_Lembaga }}</td>
                                                    <td>{{ $item->Tanggal }}</td>
                                                    <td>{{ $item->Kegiatan }}</td>
                                                    <td>{{ $item->Keterangan }}</td>
                                                    <td>{{ $item->Kategori }}</td>
                                                    <td> <a href="#" class="icon" title="Lihat Detail"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a href="#" class="icon" title="Unduh Dokumen"><i
                                                                class="fas fa-download"></i></a>
                                                    </td>
                                                    <td> <a href="#" class="icon" title="Lihat Detail"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="#" class="icon" title="Unduh Dokumen"><i
                                                        class="fas fa-download"></i></a>
                                                <a href="#" class="icon" title="Unduh Dokumen"><i
                                                        class="fas fa-download"></i></a>
                                            </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            {{ $tu->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @include ('layout.footer')
        </div>
    </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

    <!-- Scripts -->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
