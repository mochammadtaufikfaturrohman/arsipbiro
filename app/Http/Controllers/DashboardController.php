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
        // Ambil data dari database
        $tu = Tu::paginate(5);
        $yandas = Yandas::paginate(5);
        $bms = Bms::paginate(5);
        $npd = Npd::paginate(5);

        // Kirim data ke view dashboard
        return view('dashboard', compact('tu', 'yandas', 'bms', 'npd'));
    }
}
