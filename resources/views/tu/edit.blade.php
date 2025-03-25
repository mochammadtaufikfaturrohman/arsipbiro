<form action="{{ route('tu.update', $tu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="No_Arsip">No Arsip</label>
    <input type="text" name="No_Arsip" value="{{ $tu->No_Arsip }}" required>

    <label for="Nama_Lembaga">Nama Lembaga</label>
    <input type="text" name="Nama_Lembaga" value="{{ $tu->Nama_Lembaga }}" required>

    <label for="Tanggal">Tanggal</label>
    <input type="date" name="Tanggal" value="{{ $tu->Tanggal }}" required>

    <label for="Kegiatan">Kegiatan</label>
    <input type="text" name="Kegiatan" value="{{ $tu->Kegiatan }}" required>

    <label for="Keterangan">Keterangan</label>
    <textarea name="Keterangan">{{ $tu->Keterangan }}</textarea>

    <label for="Kategori">Kategori</label>
    <select name="Kategori" required>
        <option value="Arsip Dinamis" {{ $tu->Kategori == 'Arsip Dinamis' ? 'selected' : '' }}>Arsip Dinamis</option>
        <option value="Arsip Statis" {{ $tu->Kategori == 'Arsip Statis' ? 'selected' : '' }}>Arsip Statis</option>
        <option value="Arsip Vital" {{ $tu->Kategori == 'Arsip Vital' ? 'selected' : '' }}>Arsip Vital</option>
        <option value="Arsip Permanen" {{ $tu->Kategori == 'Arsip Permanen' ? 'selected' : '' }}>Arsip Permanen</option>
        <option value="Arsip Fisik" {{ $tu->Kategori == 'Arsip Fisik' ? 'selected' : '' }}>Arsip Fisik</option>
        <option value="Arsip Retensi Jangka Pendek"
            {{ $tu->Kategori == 'Arsip Retensi Jangka Pendek' ? 'selected' : '' }}>Arsip Retensi Jangka Pendek</option>
        <option value="Arsip Retensi Jangka Panjang"
            {{ $tu->Kategori == 'Arsip Retensi Jangka Panjang' ? 'selected' : '' }}>Arsip Retensi Jangka Panjang
        </option>
        <option value="Arsip Elektronik" {{ $tu->Kategori == 'Arsip Elektronik' ? 'selected' : '' }}>Arsip Elektronik
        </option>
    </select>

    <div>
        <label for="dokumen">Unggah Dokumen Baru (Opsional)</label>
        <input type="file" name="dokumen" accept=".pdf,.doc,.docx">
    </div>

    @if ($tu->dokumen)
        <p>Dokumen saat ini: <a href="{{ route('tu.download', $tu->id) }}">Unduh</a></p>
    @endif

    <button type="submit">Update</button>
</form>
