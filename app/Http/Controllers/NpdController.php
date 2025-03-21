<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Npd; // Sesuai dengan nama kelas model

class NpdController extends Controller
{
    public function index()
    {
        $npd = npd::paginate(1); // Mengambil semua data dari model Tu
        return view('npd.index', compact('npd')); // Kirim ke tampilan
    }
}
