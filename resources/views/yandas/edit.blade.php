<form action="{{ route('yandas.update', $yandas->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="No_Arsip">No Arsip</label>
    <input type="text" name="No_Arsip" value="{{ $yandas->No_Arsip }}" required>

    <label for="Nama_Lembaga">Nama Lembaga</label>
    <input type="text" name="Nama_Lembaga" value="{{ $yandas->Nama_Lembaga }}" required>

    <label for="Tanggal">Tanggal</label>
    <input type="date" name="Tanggal" value="{{ $yandas->Tanggal }}" required>

    <label for="Kegiatan">Kegiatan</label>
    <input type="text" name="Kegiatan" value="{{ $yandas->Kegiatan }}" required>

    <label for="Keterangan">Keterangan</label>
    <textarea name="Keterangan">{{ $yandas->Keterangan }}</textarea>

    <label for="Kategori">Kategori</label>
    <select name="Kategori" required>
        <option value="Arsip Dinamis" {{ $yandas->Kategori == 'Arsip Dinamis' ? 'selected' : '' }}>Arsip Dinamis</option>
        <option value="Arsip Statis" {{ $yandas->Kategori == 'Arsip Statis' ? 'selected' : '' }}>Arsip Statis</option>
        <option value="Arsip Vital" {{ $yandas->Kategori == 'Arsip Vital' ? 'selected' : '' }}>Arsip Vital</option>
        <option value="Arsip Permanen" {{ $yandas->Kategori == 'Arsip Permanen' ? 'selected' : '' }}>Arsip Permanen</option>
        <option value="Arsip Retensi Jangka Pendek" {{ $yandas->Kategori == 'Arsip Retensi Jangka Pendek' ? 'selected' : '' }}>Arsip Retensi Jangka Pendek</option>
        <option value="Arsip Retensi Jangka Panjang" {{ $yandas->Kategori == 'Arsip Retensi Jangka Panjang' ? 'selected' : '' }}>Arsip Retensi Jangka Panjang</option>
        <option value="Arsip Elektronik" {{ $yandas->Kategori == 'Arsip Elektronik' ? 'selected' : '' }}>Arsip Elektronik</option>
    </select>
    <div>
        <label for="dokumen">Unggah Dokumen Baru (Opsional)</label>
        <input type="file" name="dokumen" accept=".pdf,.doc,.docx">
    </div>

    @if($yandas->dokumen)
        <p>Dokumen saat ini: <a href="{{ route('yandas.download', $yandas->id) }}">Unduh</a></p>
    @endif
    @if($yandas->dokumen)
    <p>Dokumen saat ini: <a href="{{ route('yandas.download', $yandas->id) }}">Unduh</a></p>
@endif

    <button type="submit">Update</button>
</form>
