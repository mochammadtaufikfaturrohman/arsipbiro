<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Npd;

class NpdController extends Controller
{
    public function index()
    {
        $npd = Npd::paginate(10);
        return view('npd.index', compact('npd'));
    }

    public function createForm()
    {
        return view('npd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_Rak' => 'required|string|max:25',
            'No_Arsip' => 'required|string|unique:npd,No_Arsip',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Divisi' => 'required|in:NPD 1,NPD 2,NPD 3',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Fisik,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf|max:5048'
        ]);

        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/npd', 'public');
        }

        Npd::create($data);

        return redirect()->route('npd')->with('success', 'Data NPD berhasil disimpan.');
    }

    public function edit($id)
    {
        $item = Npd::findOrFail($id);
        return view('npd.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'No_Rak' => 'required|string|max:25',
            'No_Arsip' => 'required|string|unique:npd,No_Arsip,' . $id . ',id|max:50',
            'Nama_Lembaga' => 'required|string|max:255',
            'Tanggal' => 'required|date',
            'Kegiatan' => 'required|string',
            'Keterangan' => 'nullable|string',
            'Divisi' => 'required|in:NPD 1,NPD 2,NPD 3',
            'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Fisik,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            'dokumen' => 'nullable|file|mimes:pdf|max:5048'
        ]);

        $item = Npd::findOrFail($id);
        $data = $request->except('dokumen');

        if ($request->hasFile('dokumen')) {
            if ($item->dokumen && Storage::disk('public')->exists($item->dokumen)) {
                Storage::disk('public')->delete($item->dokumen);
            }

            $data['Dokumen'] = $request->file('dokumen')->store('dokumen/npd', 'public');
        }

        $item->update($data);

        return redirect()->route('npd')->with('success', 'Data NPD berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = Npd::findOrFail($id);

        if ($item->dokumen && Storage::disk('public')->exists($item->dokumen)) {
            Storage::disk('public')->delete($item->dokumen);
        }

        $item->delete();

        return redirect()->route('npd')->with('success', 'Data berhasil dihapus.');
    }

    public function download($id)
    {
        $data = Npd::findOrFail($id);
    
        if (!$data->Dokumen) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }
    
        $path = storage_path('app/public/' . $data->Dokumen);

    
        if (!file_exists($path)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di server.');
        }
    
        return response()->download($path);
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        $npd = Npd::where('No_Arsip', 'LIKE', "%{$query}%")
            ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
            ->orWhere('Kegiatan', 'LIKE', "%{$query}%")
            ->paginate(10)
            ->appends($request->all());

        return view('npd.index', compact('npd'));
    }

    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $divisi = $request->input('divisi');
        $query = $request->input('query');

        $npd = Npd::query();

        if ($kategori) {
            $npd->where('Kategori', $kategori);
        }

        if ($divisi) {
            $npd->where('Divisi', $divisi);
        }

        if ($query) {
            $npd->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'LIKE', "%{$query}%")
                    ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
                    ->orWhere('Kegiatan', 'LIKE', "%{$query}%");
            });
        }

        $npd = $npd->paginate(10)->appends($request->all());

        return view('npd.index', compact('npd'));
    }
}
