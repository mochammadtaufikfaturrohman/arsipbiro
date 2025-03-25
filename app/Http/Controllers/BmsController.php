<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bms;

class BmsController extends Controller
{
    public function index()
    {
        $bms = Bms::paginate(10); // Mengambil data dengan pagination
        return view('bms.index', compact('bms')); // Kirim data ke view
    }

    public function create()
    {
        return view('bms.create'); // Menampilkan form untuk membuat data baru
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:bms,No_Arsip',
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

        Bms::create($data);

        return redirect()->route('bms')->with('success', 'Data BMS berhasil disimpan.');
    }

    public function edit($id)
    {
        $bms = Bms::findOrFail($id); // Cari data berdasarkan ID
        return view('bms.edit', compact('bms')); // Kirim data ke view edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:bms,No_Arsip,' . $id . ',id|max:50',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $bms = Bms::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['Dokumen'] = $request->file('dokumen')->store('dokumen');
        }

        $bms->update($data);

        return redirect()->route('bms')->with('success', 'Data BMS berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bms = Bms::findOrFail($id);
        $bms->delete();

        return redirect()->route('bms')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $bms = Bms::findOrFail($id);

        // Pastikan kolom 'Dokumen' menyimpan path file
        $filePath = storage_path('app/' . $bms->Dokumen);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->route('bms')->with('error', 'File tidak ditemukan.');
    }
}

