<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tu;

class TuController extends Controller
{
    public function index()
    {
        $tu = Tu::paginate(10); // Mengambil data dengan pagination
        return view('tu.index', compact('tu')); // Kirim data ke view
    }

    public function createForm()
    {
        return view('tu.create'); // Menampilkan form untuk membuat data baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:tu,No_Arsip',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            // Simpan file dokumen ke folder 'dokumen/tu' dan dapatkan path-nya
            $data['dokumen'] = $request->file('dokumen')->store('dokumen/tu', 'public');
        }

        Tu::create($data);

        return redirect()->route('tu')->with('success', 'Data TU berhasil disimpan.');
    }

    public function edit($id)
    {
        $tu = Tu::findOrFail($id); // Cari data berdasarkan ID
        return view('tu.edit', compact('tu')); // Kirim data ke view edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:tu,No_Arsip,' . $id . ',id|max:50',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $tu = Tu::findOrFail($id);
        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            // Hapus file dokumen lama jika ada
            if ($tu->dokumen && Storage::disk('public')->exists($tu->dokumen)) {
                Storage::disk('public')->delete($tu->dokumen);
            }

            // Simpan file dokumen baru
            $data['dokumen'] = $request->file('dokumen')->store('dokumen/tu', 'public');
        }

        $tu->update($data);

        return redirect()->route('tu')->with('success', 'Data TU berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tu = Tu::findOrFail($id);

        // Hapus file dokumen jika ada
        if ($tu->dokumen && Storage::disk('public')->exists($tu->dokumen)) {
            Storage::disk('public')->delete($tu->dokumen);
        }

        // Hapus data dari database
        $tu->delete();

        return redirect()->route('tu')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $tu = Tu::findOrFail($id);

        // Pastikan kolom 'dokumen' menyimpan path file
        $filePath = storage_path('app/public/' . $tu->dokumen);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->route('tu')->with('error', 'File tidak ditemukan.');
    }
}
