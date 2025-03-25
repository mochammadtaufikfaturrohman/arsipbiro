<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Npd extends Model
{
    use HasFactory;

    protected $table = 'npd'; // Nama tabel di database

    protected $primaryKey = 'id'; // Primary key default
    public $incrementing = true; // Auto-increment aktif
    protected $keyType = 'int'; // Tipe data primary key adalah integer

    protected $fillable = [
        'id', // Primary key
        'No_Arsip',
        'Nama_Lembaga',
        'Tanggal',
        'Kegiatan',
        'Keterangan',
        'Kategori',
        'Dokumen',
    ];
}
