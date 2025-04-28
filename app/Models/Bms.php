<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bms extends Model
{
    use HasFactory;
    protected $table = 'bms';
   
    protected $primaryKey = 'id'; // Primary key default
    public $incrementing = true; // Auto-increment aktif
    protected $keyType = 'int'; // Tipe data primary key adalah integer
   
    protected $fillable = [
        'id',
        'No_Arsip',
        'Nama_Lembaga',
        'Tanggal',
        'Kegiatan',
        'Keterangan',
        'Divisi',
        'Kategori',
        'Dokumen',
    ];
}
