<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tu; // Sesuai dengan nama kelas model

class TuController extends Controller
{
    public function index()
    {
        $tu = tu::paginate(1); // Mengambil semua data dari model Tu
        return view('tu.index', compact('tu')); // Kirim ke tampilan
    }
}
 