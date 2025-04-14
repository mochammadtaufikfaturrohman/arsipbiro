<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Tu;
use App\Models\Yandas;
use App\Models\Bms;
use App\Models\Npd;

class DashboardController extends BaseController
{
    public function index()
    {
        // Ambil data paginasi
        $tu = Tu::paginate(10);
        $yandas = Yandas::paginate(10);
        $bms = Bms::paginate(10);
        $npd = Npd::paginate(10);
    
        // Hitung jumlah total data
        $totalTu = Tu::count();
        $totalYandas = Yandas::count();
        $totalBms = Bms::count();
        $totalNpd = Npd::count();
    
        // Kirim semuanya ke view
        return view('dashboard', compact(
            'tu', 'yandas', 'bms', 'npd',
            'totalTu', 'totalYandas', 'totalBms', 'totalNpd'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari data di semua divisi berdasarkan No Arsip, Nama Lembaga, atau Kegiatan
        $tu = Tu::where('No_Arsip', 'LIKE', "%{$query}%")
            ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
            ->orWhere('Kegiatan', 'LIKE', "%{$query}%")
            ->paginate(10);

        $yandas = Yandas::where('No_Arsip', 'LIKE', "%{$query}%")
            ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
            ->orWhere('Kegiatan', 'LIKE', "%{$query}%")
            ->paginate(10);

        $bms = Bms::where('No_Arsip', 'LIKE', "%{$query}%")
            ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
            ->orWhere('Kegiatan', 'LIKE', "%{$query}%")
            ->paginate(10);

        $npd = Npd::where('No_Arsip', 'LIKE', "%{$query}%")
            ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
            ->orWhere('Kegiatan', 'LIKE', "%{$query}%")
            ->paginate(10);

        // Hitung jumlah total data
        $totalTu = Tu::count();
        $totalYandas = Yandas::count();
        $totalBms = Bms::count();
        $totalNpd = Npd::count();

        // Kirim semuanya ke view
        return view('dashboard', compact(
            'tu', 'yandas', 'bms', 'npd',
            'totalTu', 'totalYandas', 'totalBms', 'totalNpd'
        ));
    }

    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $query = $request->input('query');

        // Filter dan cari data di semua divisi
        $tu = Tu::query();
        $yandas = Yandas::query();
        $bms = Bms::query();
        $npd = Npd::query();

        if ($kategori) {
            $tu->where('Kategori', $kategori);
            $yandas->where('Kategori', $kategori);
            $bms->where('Kategori', $kategori);
            $npd->where('Kategori', $kategori);
        }

        if ($query) {
            $tu->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'LIKE', "%{$query}%")
                    ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
                    ->orWhere('Kegiatan', 'LIKE', "%{$query}%");
            });

            $yandas->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'LIKE', "%{$query}%")
                    ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
                    ->orWhere('Kegiatan', 'LIKE', "%{$query}%");
            });

            $bms->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'LIKE', "%{$query}%")
                    ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
                    ->orWhere('Kegiatan', 'LIKE', "%{$query}%");
            });

            $npd->where(function ($q) use ($query) {
                $q->where('No_Arsip', 'LIKE', "%{$query}%")
                    ->orWhere('Nama_Lembaga', 'LIKE', "%{$query}%")
                    ->orWhere('Kegiatan', 'LIKE', "%{$query}%");
            });
        }

        $tu = $tu->paginate(10)->appends($request->all());
        $yandas = $yandas->paginate(10)->appends($request->all());
        $bms = $bms->paginate(10)->appends($request->all());
        $npd = $npd->paginate(10)->appends($request->all());

        // Hitung jumlah total data
        $totalTu = Tu::count();
        $totalYandas = Yandas::count();
        $totalBms = Bms::count();
        $totalNpd = Npd::count();

        // Kirim semuanya ke view
        return view('dashboard', compact(
            'tu', 'yandas', 'bms', 'npd',
            'totalTu', 'totalYandas', 'totalBms', 'totalNpd'
        ));
    }
}
