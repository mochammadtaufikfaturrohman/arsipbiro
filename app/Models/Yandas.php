<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yandas extends Model
{
    use HasFactory;
    protected $table = 'yandas';
   
    protected $primaryKey = 'id'; // Pastikan ini ada
    public $incrementing = true;
    protected $keyType = 'int';
   
    protected $fillable = [
        'id',
        'No_Arsip',
        'Nama_Lembaga',
        'Tanggal',
        'Kegiatan',
        'Keterangan',
        'Kategori',
        'Dokumen',
    ];
}
