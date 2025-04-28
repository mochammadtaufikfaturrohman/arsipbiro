$(document).ready(function () {
    $('#searchInput').on('keyup', function () {
        let query = $(this).val();

        // Kirim permintaan AJAX ke server
        $.ajax({
            url: searchUrl,
            type: "GET",
            data: { query: query },
            success: function (data) {
                let rows = '';

                if (data.length > 0) {
                    data.forEach(function (item) {
                        rows += `
                            <tr>
                                <td>${item.No_Arsip}</td>
                                <td>${item.Nama_Lembaga}</td>
                                <td>${item.Tanggal}</td>
                                <td>${item.Kegiatan}</td>
                                <td>${item.Keterangan}</td>
                                <td>${item.Kategori}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                    <a href="${downloadUrl}/${item.id}" class="btn btn-success btn-sm" title="Unduh Dokumen">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    rows = `
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data ditemukan.</td>
                        </tr>
                    `;
                }

                $('#dataTableBody').html(rows); // Perbarui tabel dengan data baru
            },
            error: function () {
                console.error('Terjadi kesalahan saat memuat data.');
            }
        });
    });
});