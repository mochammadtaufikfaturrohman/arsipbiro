<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Npd;

class NpdController extends Controller
{
    public function index()
    {
        $npd = Npd::paginate(10); // Mengambil data dengan pagination
        return view('npd.index', compact('npd')); // Kirim data ke view
    }

    public function create()
    {
        return view('npd.create'); // Menampilkan form untuk membuat data baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_Arsip' => 'required|integer|unique:npd,No_Arsip',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['Dokumen'] = $request->file('dokumen')->store('dokumen');
        }

        Npd::create($data);

        return redirect()->route('npd')->with('success', 'Data NPD berhasil disimpan.');
    }

    public function edit($id)
    {
        $npd = Npd::findOrFail($id); // Cari data berdasarkan ID
        return view('npd.edit', compact('npd')); // Kirim data ke view edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:npd,No_Arsip,' . $id . ',id|max:50',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $npd = Npd::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['Dokumen'] = $request->file('dokumen')->store('dokumen');
        }

        $npd->update($data);

        return redirect()->route('npd')->with('success', 'Data NPD berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $npd = Npd::findOrFail($id);
        $npd->delete();

        return redirect()->route('npd')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $npd = Npd::findOrFail($id);

        // Pastikan kolom 'Dokumen' menyimpan path file
        $filePath = storage_path('app/' . $npd->Dokumen);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->route('npd')->with('error', 'File tidak ditemukan.');
    }
}
