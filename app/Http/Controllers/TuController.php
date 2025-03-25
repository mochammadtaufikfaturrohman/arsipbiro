<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'No_Arsip' => 'required|integer|unique:tu,No_Arsip',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        Tu::create($request->all());

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
        ]);

        $tu = Tu::findOrFail($id);
        $tu->update($request->all());

        return redirect()->route('tu')->with('success', 'Data TU berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tu = Tu::findOrFail($id);
        $tu->delete();

        return redirect()->route('tu')->with('success', 'Data berhasil dihapus.');
    }
}
