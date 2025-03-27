<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arsip Non-Pelayanan Dasar</title>
    <link rel="icon" href="template/img/jabar.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include ('layout.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include ('layout.navbar')

                <!-- nyoba -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Non-Pelayanan Dasar</h1>
                    <p class="mb-4">NPD diajukan oleh satuan kerja perangkat daerah (SKPD) kepada Badan Pengelola
                        Keuangan Daerah (BPKD) untuk mendapatkan dana yang sudah dianggarkan dalam APBD.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dokumen Non-Pelayanan Dasar</h6>
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
                                @if (Auth()->user()->role == 'admin')
                                    <button type="button" class="btn btn-success"
                                        data-bs-toggle="modal"data-bs-target="#tambahArsipModal">
                                        Tambah Arsip
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Arsip</th>
                                            <th>Nama Lembaga</th>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Keterangan</th>
                                            <th>Kategori</th>
                                            <th>Dokumen</th>
                                            @if (Auth()->user()->role == 'admin')
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($npd) && $npd->count() > 0)
                                            @foreach ($npd as $item)
                                                <tr>
                                                    <td>{{ $item->No_Arsip }}</td>
                                                    <td>{{ $item->Nama_Lembaga }}</td>
                                                    <td>{{ $item->Tanggal }}</td>
                                                    <td>{{ $item->Kegiatan }}</td>
                                                    <td>{{ $item->Keterangan }}</td>
                                                    <td>{{ $item->Kategori }}</td>
                                                    <td> <a href="#" class="icon" title="Lihat Detail"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a href="{{ route('npd.download', $item->id) }}" class="icon"
                                                            title="Unduh Dokumen">
                                                            <i class="fas fa-download"></i>
                                                    </td>
                                                    @if (Auth()->user()->role== 'admin')
                                                    <td>
                                                        <a href="{{ route('npd.edit', $item->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('npd.destroy', $item->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                    @endif
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
                            {{ $npd->links() }}
                        </div>
                    </div>

                </div>
            </div>
            @include ('layout.footer')
        </div>

        <!-- Modal Tambah Arsip -->
        <div class="modal fade" id="tambahArsipModal" tabindex="-1" aria-labelledby="tambahArsipModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tambahArsipModalLabel">Tambah Arsip Baru</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        @include('npd.create')
                    </div>
                </div>
            </div>
        </div>


        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

        <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
        <!-- Bootstrap 5.1 Bundle dengan Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
