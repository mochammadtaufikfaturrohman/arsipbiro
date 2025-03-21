<form action="{{ route('yandas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>No Arsip</label>
        <input type="text" name="No_Arsip" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Nama Lembaga</label>
        <input type="text" name="Nama_Lembaga" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="Tanggal" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Kegiatan</label>
        <input type="text" name="Kegiatan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <textarea name="Keterangan" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select name="Kategori" class="form-control" required>
            <option value="Arsip Dinamis">Arsip Dinamis</option>
            <option value="Arsip Statis">Arsip Statis</option>
        </select>
    </div>
    <div class="form-group">
        <label>Dokumen</label>
        <input type="file" name="Dokumen" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
