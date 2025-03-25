

<div class="container">
    <h2>Tambah Arsip Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="No_Arsip" class="form-label">Nomor Arsip</label>
            <input type="text" name="No_Arsip" id="No_Arsip" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Nama_Lembaga" class="form-label">Nama Lembaga</label>
            <input type="text" name="Nama_Lembaga" id="Nama_Lembaga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Tanggal" class="form-label">Tanggal</label>
            <input type="date" name="Tanggal" id="Tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Kegiatan" class="form-label">Kegiatan</label>
            <input type="text" name="Kegiatan" id="Kegiatan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Keterangan" class="form-label">Keterangan</label>
            <textarea name="Keterangan" id="Keterangan" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="Kategori" class="form-label">Kategori</label>
            <select name="Kategori" id="Kategori" class="form-control" required>
              
<option value="Arsip Dinamis">Arsip Dinamis</option>
<option value="Arsip Statis">Arsip Statis</option>
<option value="Arsip Dinamis">Arsip Vital</option>
<option value="Arsip Statis">Arsip Fisik</option>
<option value="Arsip Dinamis">Arsip Permanen</option>
<option value="Arsip Dinamis">Arsip Retensi Jangka Pendek</option>
<option value="Arsip Statis">Arsip Retensi Jangka Panjang</option>
<option value="Arsip Statis">Arsip Elektronik</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Dokumen" class="form-label">Unggah Dokumen</label>
            <input type="file" name="Dokumen" id="Dokumen" class="form-control" accept=".pdf,.doc,.docx" required>
            <small class="text-muted">Format: PDF, DOC, DOCX (Max: 2MB)</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Arsip</button>
     
    </form>
</div>
