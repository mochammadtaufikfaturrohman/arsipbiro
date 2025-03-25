<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['dokumen'] = $request->file('dokumen')->store('dokumen');
        }

        Yandas::create($data);

        // Mengarahkan ke rute 'yandas' dengan pesan sukses
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
        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['dokumen'] = $request->file('dokumen')->store('dokumen');
        }

        $yandas->update($data);

        // Mengarahkan ke rute 'yandas' dengan pesan sukses
        return redirect()->route('yandas')->with('success', 'Data Yandas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $yandas = Yandas::findOrFail($id);
        $yandas->delete();

        // Mengarahkan ke rute 'yandas' dengan pesan sukses
        return redirect()->route('yandas')->with('success', 'Data berhasil dihapus.');
    }
}
