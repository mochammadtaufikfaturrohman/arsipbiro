<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tu', function (Blueprint $table) {
            $table->id('No_Arsip');
            $table->string('Nama_Lembaga');
            $table->date('Tanggal');
            $table->text('Kegiatan');
            $table->text('Keterangan')->nullable();
            $table->enum('Kategori', [
                'Arsip Dinamis', 
                'Arsip Statis', 
                'Arsip Vital', 
                'Arsip Permanen', 
                'Arsip Retensi Jangka Pendek', 
                'Arsip Retensi Jangka Panjang', 
                'Arsip Elektronik'
            ]);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tu');
    }
};
