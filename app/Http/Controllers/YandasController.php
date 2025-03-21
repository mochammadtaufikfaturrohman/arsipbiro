<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Yandas; // Sesuai dengan nama kelas model

class YandasController extends Controller
    {
        public function index()
        {
            $yandas = yandas::paginate(1); // Mengambil semua data dari model Tu
            return view('yandas.index', compact('yandas')); // Kirim ke tampilan
            
        }
        public function create()
        {
            return view('yandas.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                
                'No_Arsip' => 'required|integer|unique:yandas,No_Arsip',
                'Nama_Lembaga' => 'required|string|max:255',
                'Tanggal' => 'required|date',
                'Kegiatan' => 'required|string',
                'Keterangan' => 'nullable|string',
                'Kategori' => 'required|in:Arsip Dinamis,Arsip Statis,Arsip Vital,Arsip Permanen,Arsip Retensi Jangka Pendek,Arsip Retensi Jangka Panjang,Arsip Elektronik',
            ]);
        
            // Simpan data ke database
            Yandas::create($request->all());
        
            // Redirect ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Data Yandas berhasil disimpan.');
        }
        
    }
