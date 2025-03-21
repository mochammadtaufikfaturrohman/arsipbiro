<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bms; // Sesuai dengan nama kelas model

class BmsController  extends Controller
{
    public function index()
    {
        $bms = bms::paginate(1); // Mengambil semua data dari model Tu
        return view('bms.index', compact('bms')); // Kirim ke tampilan
    }
}
 
