<form action="{{ route('yandas.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="No_Arsip">Nomor Arsip</label>
        <input type="text" class="form-control" id="No_Arsip" name="No_Arsip" value="{{ $item->No_Arsip }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="Nama_Lembaga">Nama Lembaga</label>
        <input type="text" class="form-control" id="Nama_Lembaga" name="Nama_Lembaga"
            value="{{ $item->Nama_Lembaga }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="Tanggal">Tanggal</label>
        <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="{{ $item->Tanggal }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="Kegiatan">Kegiatan</label>
        <textarea class="form-control" id="Kegiatan" name="Kegiatan" required>{{ $item->Kegiatan }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="Keterangan">Keterangan</label>
        <textarea class="form-control" id="Keterangan" name="Keterangan">{{ $item->Keterangan }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label for="Kategori">Kategori</label>
        <select class="form-control" id="Kategori" name="Kategori" required>
            <option value="Arsip Dinamis" {{ $item->Kategori == 'Arsip Dinamis' ? 'selected' : '' }}>Arsip Dinamis</option>
            <option value="Arsip Statis" {{ $item->Kategori == 'Arsip Statis' ? 'selected' : '' }}>Arsip Statis</option>
            <option value="Arsip Vital" {{ $item->Kategori == 'Arsip Vital' ? 'selected' : '' }}>Arsip Vital</option>
            <option value="Arsip Fisik" {{ $item->Kategori == 'Arsip Fisik' ? 'selected' : '' }}>Arsip Fisik</option>
            <option value="Arsip Permanen" {{ $item->Kategori == 'Arsip Permanen' ? 'selected' : '' }}>Arsip Permanen</option>
            <option value="Arsip Retensi Jangka Pendek" {{ $item->Kategori == 'Arsip Retensi Jangka Pendek' ? 'selected' : '' }}>Arsip Retensi Jangka Pendek</option>
            <option value="Arsip Retensi Jangka Panjang" {{ $item->Kategori == 'Arsip Retensi Jangka Panjang' ? 'selected' : '' }}>  Arsip Retensi Jangka Panjang</option>
            <option value="Arsip Elektronik" {{ $item->Kategori == 'Arsip Elektronik' ? 'selected' : '' }}>Arsip Elektronik</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="dokumen">Dokumen</label>
        @if ($item->dokumen)
            <p>Dokumen saat ini: {{ basename($item->dokumen) }}</p>
        @endif
        <input type="file" class="form-control" id="dokumen" name="dokumen">
        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah dokumen</small>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
</form>
