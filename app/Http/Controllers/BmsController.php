<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bms;
use Illuminate\Support\Facades\Storage;

class BmsController extends Controller
{
    public function index()
    {
        $bms = Bms::paginate(10);
        return view('bms.index', compact('bms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:bms,No_Arsip',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Divisi' => 'required|in:Kelembagaan,Sarana Prasarana',
            'Kategori' => 'required',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            // Buat folder jika belum ada
            if (!Storage::disk('public')->exists('dokumen/bms')) {
                Storage::disk('public')->makeDirectory('dokumen/bms');
            }

            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/bms', 'public');
        }

        Bms::create($data);

        return redirect()->route('bms')->with('success', 'Data BMS berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'No_Arsip' => 'required|string|unique:bms,No_Arsip,' . $id . ',id|max:50',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Divisi' => 'required|in:Kelembagaan,Sarana Prasarana',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Fisik,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $bms = Bms::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            // Buat folder jika belum ada
            if (!Storage::disk('public')->exists('dokumen/bms')) {
                Storage::disk('public')->makeDirectory('dokumen/bms');
            }

            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/bms', 'public');
        }

        $bms->update($data);

        return redirect()->route('bms')->with('success', 'Data BMS berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bms = Bms::findOrFail($id);

        // Hapus file dokumen jika ada
        if ($bms->Dokumen && Storage::disk('public')->exists($bms->Dokumen)) {
            Storage::disk('public')->delete($bms->Dokumen);
        }

        // Hapus data dari database
        $bms->delete();

        return redirect()->route('bms')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $bms = Bms::findOrFail($id);

        if ($bms->Dokumen) {
            $filePath = storage_path('app/public/' . $bms->Dokumen);
            return response()->download($filePath);
        }

        return redirect()->route('bms.index')->with('error', 'Dokumen tidak ditemukan.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $kategori = $request->input('kategori');

        $bms = Bms::query();

        if ($query) {
            $bms->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'like', "%{$query}%")
                  ->orWhere('Nama_Lembaga', 'like', "%{$query}%")
                  ->orWhere('Kegiatan', 'like', "%{$query}%");
            });
        }

        if ($kategori) {
            $bms->where('Kategori', $kategori);
        }

        $bms = $bms->paginate(10)->appends($request->only('query', 'kategori'));

        return view('bms.index', compact('bms'));
    }

    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $query = $request->input('query');

        // Filter dan cari data berdasarkan kategori dan kata kunci
        $bms = Bms::query();

        if ($kategori) {
            $bms->where('Kategori', $kategori);
        }

        if ($query) {
            $bms->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'LIKE', "%{$query}%")
                    ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
                    ->orWhere('Kegiatan', 'LIKE', "%{$query}%");
            });
        }

        $bms = $bms->paginate(10)->appends($request->all()); // Menjaga query string saat berpindah halaman

        return view('bms.index', compact('bms'));
    }
}
