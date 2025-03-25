<form action="{{ route('bms.update', $bms->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="No_Arsip">No Arsip</label>
    <input type="text" name="No_Arsip" value="{{ $bms->No_Arsip }}" required>

    <label for="Nama_Lembaga">Nama Lembaga</label>
    <input type="text" name="Nama_Lembaga" value="{{ $bms->Nama_Lembaga }}" required>

    <label for="Tanggal">Tanggal</label>
    <input type="date" name="Tanggal" value="{{ $bms->Tanggal }}" required>

    <label for="Kegiatan">Kegiatan</label>
    <input type="text" name="Kegiatan" value="{{ $bms->Kegiatan }}" required>

    <label for="Keterangan">Keterangan</label>
    <textarea name="Keterangan">{{ $bms->Keterangan }}</textarea>

    <label for="Kategori">Kategori</label>
    <select name="Kategori" required>
        <option value="Arsip Dinamis" {{ $bms->Kategori == 'Arsip Dinamis' ? 'selected' : '' }}>Arsip Dinamis</option>
        <option value="Arsip Statis" {{ $bms->Kategori == 'Arsip Statis' ? 'selected' : '' }}>Arsip Statis</option>
        <option value="Arsip Vital" {{ $bms->Kategori == 'Arsip Vital' ? 'selected' : '' }}>Arsip Vital</option>
        <option value="Arsip Permanen" {{ $bms->Kategori == 'Arsip Permanen' ? 'selected' : '' }}>Arsip Permanen
        </option>
        <option value="Arsip Fisik" {{ $bms->Kategori == 'Arsip Fisik' ? 'selected' : '' }}>Arsip Fisik</option>
        <option value="Arsip Retensi Jangka Pendek"
            {{ $bms->Kategori == 'Arsip Retensi Jangka Pendek' ? 'selected' : '' }}>Arsip Retensi Jangka Pendek
        </option>
        <option value="Arsip Retensi Jangka Panjang"
            {{ $bms->Kategori == 'Arsip Retensi Jangka Panjang' ? 'selected' : '' }}>Arsip Retensi Jangka Panjang
        </option>
        <option value="Arsip Elektronik" {{ $bms->Kategori == 'Arsip Elektronik' ? 'selected' : '' }}>Arsip Elektronik
        </option>
    </select>

    <div>
        <label for="dokumen">Unggah Dokumen Baru (Opsional)</label>
        <input type="file" name="dokumen" accept=".pdf,.doc,.docx">
    </div>

    @if ($bms->Dokumen)
        <p>Dokumen saat ini: <a href="{{ route('bms.download', $bms->id) }}">Unduh</a></p>
    @endif

    <button type="submit">Update</button>
</form>
