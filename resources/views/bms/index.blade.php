<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arsip Bina Mental Spiritual</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Bina Mental Spiritual</h1>
                    <p class="mb-4">BMS digunakan untuk meningkatkan kesejahteraan masyarakat, terutama dalam bidang
                        pendidikan, kesehatan, dan ekonomi, dengan memanfaatkan dana pemerintah atau CSR dari
                        perusahaan.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dokumen Bina Mental Spiritual</h6>
                            <div class="d-flex gap-2 mt-3">
                                <select id="filterKategori" class="form-control" style="width: 160px;" onchange="filterBms()">
                                    <option value="">Semua Kategori</option>
                                    <option value="Arsip Dinamis" {{ request('kategori') == 'Arsip Dinamis' ? 'selected' : '' }}>Arsip Dinamis</option>
                                    <option value="Arsip Statis" {{ request('kategori') == 'Arsip Statis' ? 'selected' : '' }}>Arsip Statis</option>
                                    <option value="Arsip Vital" {{ request('kategori') == 'Arsip Vital' ? 'selected' : '' }}>Arsip Vital</option>
                                    <option value="Arsip Fisik" {{ request('kategori') == 'Arsip Fisik' ? 'selected' : '' }}>Arsip Fisik</option>
                                    <option value="Arsip Permanen" {{ request('kategori') == 'Arsip Permanen' ? 'selected' : '' }}>Arsip Permanen</option>
                                    <option value="Arsip Retensi Jangka Pendek" {{ request('kategori') == 'Arsip Retensi Jangka Pendek' ? 'selected' : '' }}>Arsip Retensi Jangka Pendek</option>
                                    <option value="Arsip Retensi Jangka Panjang" {{ request('kategori') == 'Arsip Retensi Jangka Panjang' ? 'selected' : '' }}>Arsip Retensi Jangka Panjang</option>
                                    <option value="Arsip Elektronik" {{ request('kategori') == 'Arsip Elektronik' ? 'selected' : '' }}>Arsip Elektronik</option>
                                </select>
                                <form action="{{ route('bms.search') }}" method="GET"
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" id="searchInput" name="query" class="form-control bg-white border-0 small" placeholder="Search for..." aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
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
                                    <tbody id="dataTableBody">
                                        @if (isset($bms) && $bms->count() > 0)
                                            @foreach ($bms as $item)
                                                <tr>
                                                    <td>{{ $item->No_Arsip }}</td>
                                                    <td>{{ $item->Nama_Lembaga }}</td>
                                                    <td>{{ $item->Tanggal }}</td>
                                                    <td>{{ $item->Kegiatan }}</td>
                                                    <td>{{ $item->Keterangan }}</td>
                                                    <td>{{ $item->Kategori }}</td>
                                                    <td> <a href="#" class="btn btn-primary btn-sm" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ route('bms.download', $item->id) }}" class="btn btn-success btn-sm" title="Unduh Dokumen">
                                                            <i class="fas fa-download"></i></a>
                                                    </td>
                                                    @if (Auth()->user()->role == 'admin')
                                                        <td class="text-nowrap">
                                                            <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editArsipModal{{ $item->id }}">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center">Tidak ada data</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $bms->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @include ('layout.footer')
        </div>

        <!-- Awal Modal Delete -->
        @foreach ($bms as $item)
            <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1"
                aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('bms.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        <!-- Modal Tambah Arsip -->
        <div class="modal fade" id="tambahArsipModal" tabindex="-1" aria-labelledby="tambahArsipModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="tambahArsipModalLabel">Tambah Arsip Baru</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        @include('bms.create')
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Arsip -->
        @foreach ($bms as $item)
            <div class="modal fade" id="editArsipModal{{ $item->id }}" tabindex="-1"
                aria-labelledby="editArsipModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editArsipModalLabel{{ $item->id }}">Edit Data</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            @include ('bms.edit')
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Akhir Modal Edit Arsip -->


        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

        <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
        <!-- Bootstrap 5.1 Bundle dengan Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function filterBms() {
                const kategori = document.getElementById('filterKategori').value;
                const url = "{{ route('bms.filter') }}";
                window.location.href = `${url}?kategori=${kategori}`;
            }
        </script>
</body>

</html>
