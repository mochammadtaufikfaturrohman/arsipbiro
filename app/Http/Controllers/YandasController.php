<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Yandas;

class YandasController extends Controller
{
    public function index()
    {
        $yandas = Yandas::paginate(10); // Mengambil data dengan pagination
        return view('yandas.index', compact('yandas')); // Kirim data ke view
    }

    public function create()
    {
        return view('yandas.create'); // Menampilkan form untuk membuat data baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:yandas,No_Arsip',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            // Simpan file dokumen ke folder 'dokumen/yandas' dan dapatkan path-nya
            $data['dokumen'] = $request->file('dokumen')->store('dokumen/yandas', 'public');
        }

        Yandas::create($data);

        return redirect()->route('yandas')->with('success', 'Data Yandas berhasil disimpan.');
    }

    public function edit($id)
    {
        $yandas = Yandas::findOrFail($id); // Cari data berdasarkan ID
        return view('yandas.edit', compact('yandas')); // Kirim data ke view edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:yandas,No_Arsip,' . $id . ',id|max:50',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $yandas = Yandas::findOrFail($id);
        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            // Hapus file dokumen lama jika ada
            if ($yandas->dokumen && Storage::disk('public')->exists($yandas->dokumen)) {
                Storage::disk('public')->delete($yandas->dokumen);
            }

            // Simpan file dokumen baru
            $data['dokumen'] = $request->file('dokumen')->store('dokumen/yandas', 'public');
        }

        $yandas->update($data);

        return redirect()->route('yandas')->with('success', 'Data Yandas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $yandas = Yandas::findOrFail($id);

        // Hapus file dokumen jika ada
        if ($yandas->dokumen && Storage::disk('public')->exists($yandas->dokumen)) {
            Storage::disk('public')->delete($yandas->dokumen);
        }

        // Hapus data dari database
        $yandas->delete();

        return redirect()->route('yandas')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $yandas = Yandas::findOrFail($id);

        // Pastikan kolom 'dokumen' menyimpan path file
        $filePath = storage_path('app/public/' . $yandas->dokumen);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->route('yandas')->with('error', 'File tidak ditemukan.');
    }
}
