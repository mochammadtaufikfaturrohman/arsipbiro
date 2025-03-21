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
        $tu = Tu::paginate(1);
        $yandas = Yandas::paginate(1);
        $bms = Bms::paginate(1);
        $npd = Npd::paginate(1);

        // Kirim data ke view dashboard
        return view('dashboard', compact('tu', 'yandas', 'bms', 'npd'));
    }
}
