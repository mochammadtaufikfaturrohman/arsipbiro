<form action="{{ route('npd.update', $npd->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="No_Arsip">No Arsip</label>
    <input type="text" name="No_Arsip" value="{{ $npd->No_Arsip }}" required>

    <label for="Nama_Lembaga">Nama Lembaga</label>
    <input type="text" name="Nama_Lembaga" value="{{ $npd->Nama_Lembaga }}" required>

    <label for="Tanggal">Tanggal</label>
    <input type="date" name="Tanggal" value="{{ $npd->Tanggal }}" required>

    <label for="Kegiatan">Kegiatan</label>
    <input type="text" name="Kegiatan" value="{{ $npd->Kegiatan }}" required>

    <label for="Keterangan">Keterangan</label>
    <textarea name="Keterangan">{{ $npd->Keterangan }}</textarea>

    <label for="Kategori">Kategori</label>
    <select name="Kategori" required>
        <option value="Arsip Dinamis" {{ $npd->Kategori == 'Arsip Dinamis' ? 'selected' : '' }}>Arsip Dinamis</option>
        <option value="Arsip Statis" {{ $npd->Kategori == 'Arsip Statis' ? 'selected' : '' }}>Arsip Statis</option>
        <option value="Arsip Vital" {{ $npd->Kategori == 'Arsip Vital' ? 'selected' : '' }}>Arsip Vital</option>
        <option value="Arsip Permanen" {{ $npd->Kategori == 'Arsip Permanen' ? 'selected' : '' }}>Arsip Permanen</option>
        <option value="Arsip Retensi Jangka Pendek" {{ $npd->Kategori == 'Arsip Retensi Jangka Pendek' ? 'selected' : '' }}>Arsip Retensi Jangka Pendek</option>
        <option value="Arsip Retensi Jangka Panjang" {{ $npd->Kategori == 'Arsip Retensi Jangka Panjang' ? 'selected' : '' }}>Arsip Retensi Jangka Panjang</option>
        <option value="Arsip Elektronik" {{ $npd->Kategori == 'Arsip Elektronik' ? 'selected' : '' }}>Arsip Elektronik</option>
    </select>

    <div>
        <label for="dokumen">Unggah Dokumen Baru (Opsional)</label>
        <input type="file" name="dokumen" accept=".pdf,.doc,.docx">
    </div>

    @if($npd->dokumen)
        <p>Dokumen saat ini: <a href="{{ route('npd.download', $npd->id) }}">Unduh</a></p>
    @endif

    <button type="submit">Update</button>
</form>
