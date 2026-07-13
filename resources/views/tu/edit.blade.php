<form action="{{ route('tu.update', $item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="No_Rak">Nomor Rak</label>
        <input type="text" class="form-control" id="No_Rak" name="No_Rak" value="{{ $item->No_Rak }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="No_Arsip">Nomor Arsip</label>
        <input type="text" class="form-control" id="No_Arsip" name="No_Arsip" value="{{ $item->No_Arsip }}"
            required>
    </div>
    <div class="form-group mb-3">
        <label for="Nama_Lembaga">Nama Lembaga</label>
        <input type="text" class="form-control" id="Nama_Lembaga" name="Nama_Lembaga"
            value="{{ $item->Nama_Lembaga }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="Tanggal">Tanggal Upload</label>
        <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="{{ $item->Tanggal }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="Judul_Arsip">Judul Arsip</label>

        <textarea class="form-control judul-arsip" id="Judul_Arsip" name="Judul_Arsip" required>{{ $item->Judul_Arsip }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="Keterangan">Keterangan</label>

        <textarea class="form-control keterangan" id="Keterangan" name="Keterangan">{{ $item->Keterangan }}</textarea>
    </div>
    <div class="form-group mb-3">

        <label for="Jenis_Dokumen">
            Jenis Dokumen
        </label>

        <div class="input-group">

            {{-- Spinner --}}
            <span class="input-group-text d-none loading-spinner" id="loadingSpinnerEdit">

                <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
            </span>

            {{-- Hasil --}}
            <input type="text" class="form-control jenis-dokumen" id="Jenis_Dokumen" name="Jenis_Dokumen"
                value="{{ $item->Jenis_Dokumen }}" readonly>

        </div>

        <small class="text-muted status-prediksi">
            Sistem akan melakukan klasifikasi otomatis
        </small>

        <div class="form-group mb-3">
            <label for="Kategori">Kategori</label>
            <select class="form-control" id="Kategori" name="Kategori" required>
                <option value="Arsip Dinamis" {{ $item->Kategori == 'Arsip Dinamis' ? 'selected' : '' }}>Arsip Dinamis
                </option>
                <option value="Arsip Statis" {{ $item->Kategori == 'Arsip Statis' ? 'selected' : '' }}>Arsip Statis
                </option>
                <option value="Arsip Vital" {{ $item->Kategori == 'Arsip Vital' ? 'selected' : '' }}>Arsip Vital
                </option>
                <option value="Arsip Fisik" {{ $item->Kategori == 'Arsip Fisik' ? 'selected' : '' }}>Arsip Fisik
                </option>
                <option value="Arsip Permanen" {{ $item->Kategori == 'Arsip Permanen' ? 'selected' : '' }}>Arsip
                    Permanen
                </option>
                <option value="Arsip Retensi Jangka Pendek"
                    {{ $item->Kategori == 'Arsip Retensi Jangka Pendek' ? 'selected' : '' }}>Arsip Retensi Jangka
                    Pendek
                </option>
                <option value="Arsip Retensi Jangka Panjang"
                    {{ $item->Kategori == 'Arsip Retensi Jangka Panjang' ? 'selected' : '' }}>Arsip Retensi Jangka
                    Panjang
                </option>
                <option value="Arsip Elektronik" {{ $item->Kategori == 'Arsip Elektronik' ? 'selected' : '' }}>Arsip
                    Elektronik</option>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Hindari event terdaftar berkali-kali
    $(document).off("keyup", ".keterangan");

    let typingTimer;

    $(document).on("keyup", ".keterangan", function() {

        const textarea = $(this);

        clearTimeout(typingTimer);

        typingTimer = setTimeout(function() {

            prediksiDokumen(textarea);

        }, 700);

    });

    function prediksiDokumen(textarea) {

        const form = textarea.closest("form");

        const spinner = form.find(".loading-spinner");

        const hasil = form.find(".jenis-dokumen");

        const status = form.find(".status-prediksi");

        const keterangan = textarea.val().trim();

        if (keterangan.length < 5) {

            hasil.val("");

            status.text("Masukkan minimal 5 karakter.");

            return;

        }

        spinner.removeClass("d-none");

        hasil.val("Sedang melakukan klasifikasi...");

        status.text("Sedang memproses...");

        $.ajax({

            url: "{{ url('/prediksi-jenis-dokumen') }}",

            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                Keterangan: keterangan

            },

            success: function(res) {

                spinner.addClass("d-none");

                if (res.hasil) {

                    hasil.val(res.hasil);

                    status.text("Klasifikasi berhasil.");

                } else {

                    hasil.val("Tidak Diketahui");

                    status.text("Gagal klasifikasi.");

                }

            },

            error: function(xhr) {

                spinner.addClass("d-none");

                hasil.val("Tidak Diketahui");

                console.log(xhr.responseText);

                status.text("Gagal klasifikasi.");

            }

        });

    }
</script>
