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
    
    }
