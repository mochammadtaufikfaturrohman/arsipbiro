<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'No_Arsip' => 'required|string|unique:npd,No_Arsip',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Divisi' => 'required|in:NPD 1,NPD 2,NPD 3',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Fisik,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            // Simpan file dokumen ke folder 'dokumen/npd' dan dapatkan path-nya
            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/npd', 'public');
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
            'Divisi' => 'required|in:NPD 1,NPD 2,NPD 3',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Fisik,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $npd = Npd::findOrFail($id);
        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            // Hapus file dokumen lama jika ada
            if ($npd->Dokumen && Storage::disk('public')->exists($npd->Dokumen)) {
                Storage::disk('public')->delete($npd->Dokumen);
            }

            // Simpan file dokumen baru
            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/npd', 'public');
        }

        $npd->update($data);

        return redirect()->route('npd')->with('success', 'Data NPD berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $npd = Npd::findOrFail($id);

        // Hapus file dokumen jika ada
        if ($npd->Dokumen && Storage::disk('public')->exists($npd->Dokumen)) {
            Storage::disk('public')->delete($npd->Dokumen);
        }

        // Hapus data dari database
        $npd->delete();

        return redirect()->route('npd')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $npd = Npd::findOrFail($id);

        // Pastikan kolom 'Dokumen' menyimpan path file
        $filePath = storage_path('app/public/' . $npd->Dokumen);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->route('npd')->with('error', 'File tidak ditemukan.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari data berdasarkan No Arsip, Nama Lembaga, atau Kegiatan
        $npd = Npd::where('No_Arsip', 'LIKE', "%{$query}%")
            ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
            ->orWhere('Kegiatan', 'LIKE', "%{$query}%")
            ->paginate(10)
            ->appends($request->all());// Tambahkan pagination jika diperlukan

        return view('npd.index', compact('npd'));
    }

    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $divisi = $request->input('divisi');

        // Filter data berdasarkan kategori atau divisi jika ada
        $npd = Npd::query();

        if ($kategori) {
            $npd->where('Kategori', $kategori);
        }

        if ($divisi) {
            $npd->where('Divisi', $divisi);
        }

        $npd = $npd->paginate(10)->appends($request->all()); // Menjaga query string saat berpindah halaman

        return view('npd.index', compact('npd'));
    }
}
