<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Yandas;

class YandasController extends Controller
{
    public function index()
    {
        $yandas = Yandas::paginate(10);
        return view('yandas.index', compact('yandas'));
    }

    public function create()
    {
        return view('yandas.create');
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
            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/yandas', 'public');
        }

        Yandas::create($data);

        return redirect()->route('yandas')->with('success', 'Data Yandas berhasil disimpan.');
    }

    public function edit($id)
    {
        $yandas = Yandas::findOrFail($id);
        return view('yandas.edit', compact('yandas'));
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
            if ($yandas->Dokumen && Storage::disk('public')->exists($yandas->Dokumen)) {
                Storage::disk('public')->delete($yandas->Dokumen);
            }

            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/yandas', 'public');
        }

        $yandas->update($data);

        return redirect()->route('yandas')->with('success', 'Data Yandas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $yandas = Yandas::findOrFail($id);

        if ($yandas->Dokumen && Storage::disk('public')->exists($yandas->Dokumen)) {
            Storage::disk('public')->delete($yandas->Dokumen);
        }

        $yandas->delete();

        return redirect()->route('yandas')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $yandas = Yandas::findOrFail($id);

        $filePath = storage_path('app/public/' . $yandas->Dokumen);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->route('yandas')->with('error', 'File tidak ditemukan.');
    }
}
