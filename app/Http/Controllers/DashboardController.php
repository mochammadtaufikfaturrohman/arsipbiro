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
        $tu = Tu::paginate(10);
        $yandas = Yandas::paginate(10);
        $bms = Bms::paginate(10);
        $npd = Npd::paginate(10);

        $totalTu = Tu::count();
        $totalYandas = Yandas::count();
        $totalBms = Bms::count();
        $totalNpd = Npd::count();

        return view('dashboard', compact(
            'tu',
            'yandas',
            'bms',
            'npd',
            'totalTu',
            'totalYandas',
            'totalBms',
            'totalNpd'
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
            'tu',
            'yandas',
            'bms',
            'npd',
            'totalTu',
            'totalYandas',
            'totalBms',
            'totalNpd'
        ));
    }

    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $divisi = $request->input('divisi');
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
        if ($divisi) {
            $yandas->where('Divisi', $divisi);
            $bms->where('Divisi', $divisi);
            $npd->where('Divisi', $divisi);
            $tu = collect([]);
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
        // Kalau $tu berupa collection kosong, tidak perlu paginasi
        if ($tu instanceof \Illuminate\Database\Eloquent\Builder) {
            $tu = $tu->paginate(10)->appends($request->all());
        }
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
            'tu',
            'yandas',
            'bms',
            'npd',
            'totalTu',
            'totalYandas',
            'totalBms',
            'totalNpd'
        ));
    }

    // DashboardController.php
    public function chartData()
    {
        $data = [
            'TU' => Tu::count(),
            'Sosial' => Yandas::where('Divisi', 'Sosial')->count(),
            'Kesehatan' => Yandas::where('Divisi', 'Kesehatan')->count(),
            'Pendidikan' => Yandas::where('Divisi', 'Pendidikan')->count(),
            'NPD 1' => Npd::where('Divisi', 'NPD 1')->count(),
            'NPD 2' => Npd::where('Divisi', 'NPD 2')->count(),
            'NPD 3' => Npd::where('Divisi', 'NPD 3')->count(),
            'Kelembagaan' => Bms::where('Divisi', 'Kelembagaan')->count(),
            'Sarpras' => Bms::where('Divisi', 'Sarana Prasarana')->count(),
        ];

        return response()->json($data);
    }
}
