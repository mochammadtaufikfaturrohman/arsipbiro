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
            'Divisi' => 'required|in:Sosial,Kesehatan,Pendidikan',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Fisik,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf|max:5048'
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
            'Divisi' => 'required|in:Sosial,Kesehatan,Pendidikan',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Fisik,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf|max:5048'
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

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari data berdasarkan No Arsip, Nama Lembaga, atau Kegiatan
        $yandas = Yandas::where('No_Arsip', 'LIKE', "%{$query}%")
            ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
            ->orWhere('Kegiatan', 'LIKE', "%{$query}%")
            ->paginate(10)
            ->appends($request->all()); // Menjaga query string saat berpindah halaman

        return view('yandas.index', compact('yandas'));
    }

    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $divisi = $request->input('divisi');
        $query = $request->input('query');

        // Filter dan cari data berdasarkan kategori, divisi, dan kata kunci
        $yandas = Yandas::query();

        if ($kategori) {
            $yandas->where('Kategori', $kategori);
        }

        if ($divisi) {
            $yandas->where('Divisi', $divisi);
        }

        if ($query) {
            $yandas->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'LIKE', "%{$query}%")
                    ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
                    ->orWhere('Kegiatan', 'LIKE', "%{$query}%");
            });
        }

        $yandas = $yandas->paginate(10)->appends($request->all()); // Menjaga query string saat berpindah halaman

        return view('yandas.index', compact('yandas'));
    }
}
