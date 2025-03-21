<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bms extends Model
{
    use HasFactory;
    protected $table = 'bms';
    protected $fillable = [
        'No_Arsip',
        'Nama_Lembaga',
        'Tanggal',
        'Kegiatan',
        'Keterangan',
        'Kategori',
        'Dokumen',
    ];
}
