<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KlasifikasiService;

class KlasifikasiController extends Controller
{
    protected $klasifikasiService;

    public function __construct(KlasifikasiService $klasifikasiService)
    {
        $this->klasifikasiService = $klasifikasiService;
    }

    public function prediksi(Request $request)
    {
        $hasil = $this->klasifikasiService->klasifikasi(
            $request->Judul_Arsip,
            $request->Keterangan
        );

        return response()->json([
            'hasil' => $hasil
        ]);
    }
}