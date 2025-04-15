<!DOCTYPE html>
<html lang="en">

<head>
    <title>Arsip Tata Usaha</title>
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

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tata Usaha</h1>
                    <p class="mb-4">TU bertanggung jawab memastikan kelancaran operasional kantor dengan menangani
                        segala bentuk korespondensi, pencatatan dokumen resmi, serta pendistribusian informasi kepada
                        pihak-pihak terkait.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Dokumen Tata Usaha</h6>
                            <div class="d-flex gap-2 mt-3">
                                <form action="{{ route('tu.filter') }}" method="GET" class="d-flex">
                                    <select name="kategori" id="filterKategori" class="form-control" style="width: 160px;">
                                        <option value="">Pilih Kategori</option>
                                        <option value="arsip dinamis" {{ request('kategori') == 'arsip dinamis' ? 'selected' : '' }}>Arsip Dinamis</option>
                                        <option value="arsip statis" {{ request('kategori') == 'arsip statis' ? 'selected' : '' }}>Arsip Statis</option>
                                        <option value="arsip vital" {{ request('kategori') == 'arsip vital' ? 'selected' : '' }}>Arsip Vital</option>
                                        <option value="arsip permanen" {{ request('kategori') == 'arsip permanen' ? 'selected' : '' }}>Arsip Permanen</option>
                                        <option value="arsip retensi jangka pendek" {{ request('kategori') == 'arsip retensi jangka pendek' ? 'selected' : '' }}>Arsip Retensi Jangka Pendek</option>
                                        <option value="arsip retensi jangka panjang" {{ request('kategori') == 'arsip retensi jangka panjang' ? 'selected' : '' }}>Arsip Retensi Jangka Panjang</option>
                                        <option value="arsip elektronik" {{ request('kategori') == 'arsip elektronik' ? 'selected' : '' }}>Arsip Elektronik</option>
                                        <option value="arsip fisik" {{ request('kategori') == 'arsip fisik' ? 'selected' : '' }}>Arsip Fisik</option>
                                    </select>
                                    <input type="text" name="query" class="form-control ml-2" placeholder="Search for..." value="{{ request('query') }}">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </form>
                                @if (Auth()->user()->role == 'admin')
                                <button type="button" class="btn btn-success ml-auto"
                                    data-bs-toggle="modal" data-bs-target="#tambahArsipModal">
                                    </i> Tambah Arsip
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
                                    </thead><tbody>
                                        @if (isset($tu) && $tu->count() > 0)
                                            @foreach ($tu as $item)
                                                <tr>
                                                    <td>{{ $item->No_Arsip }}</td>
                                                    <td>{{ $item->Nama_Lembaga }}</td>
                                                    <td>{{ $item->Tanggal }}</td>
                                                    <td>{{ $item->Kegiatan }}</td>
                                                    <td>{{ $item->Keterangan }}</td>
                                                    <td>{{ $item->Kategori }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm" title="Lihat Detail" data-bs-toggle="modal" data-bs-target="#viewTUModal{{ $item->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('tu.download', $item->id) }}" class="btn btn-success btn-sm" title="Unduh Dokumen">
                                                            <i class="fas fa-download"></i>
                                                        </a>
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
                                                <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
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


        <!-- Modal untuk melihat detail dokumen -->
        @foreach ($tu as $item)
<div class="modal fade" id="viewTUModal{{ $item->id }}" tabindex="-1" aria-labelledby="viewTUModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewTUModalLabel{{ $item->id }}">Detail Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <h6><strong>No Arsip:</strong> {{ $item->No_Arsip }}</h6>
                <h6><strong>Nama Lembaga:</strong> {{ $item->Nama_Lembaga }}</h6>
                <h6><strong>Tanggal:</strong> {{ $item->Tanggal }}</h6>
                <h6><strong>Kegiatan:</strong> {{ $item->Kegiatan }}</h6>
                <h6><strong>Keterangan:</strong> {{ $item->Keterangan }}</h6>
                <h6><strong>Divisi:</strong> {{ $item->Divisi }}</h6>
                <h6><strong>Kategori:</strong> {{ $item->Kategori }}</h6>
                @if ($item->Dokumen)
                    <div class="mt-4">
                        <h6><strong>Preview Dokumen:</strong></h6>
                        <iframe src="{{ asset('storage/arsip/' . $item->Dokumen) }}" frameborder="0" width="100%" height="400px"></iframe>
                    </div>
                @else
                    <p class="text-danger">Dokumen tidak tersedia.</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
        <!-- Akhir Modal untuk melihat detail dokumen -->


        <!-- Awal Modal Delete -->
        @foreach ($tu as $item)
        <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('tu.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button"class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit"class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- Akhir Modal Delete --}}

        <!-- Modal Awal Tambah Arsip -->
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
                        @include('tu.create')
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Akhir Tambah Arsip -->

        <!-- Modal Edit Arsip -->
        @foreach ($tu as $item)
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
                            @include ('tu.edit')
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function filterKategori() {
                const kategori = document.getElementById('filterKategori').value;
                const url = "{{ route('tu.filter') }}";
                window.location.href = `${url}?kategori=${kategori}`;
            }
        </script>
</body>

</html>
