<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bms', function (Blueprint $table) {
            $table->string('Dokumen')->nullable()->after('Kategori'); // Menambahkan kolom Dokumen
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bms', function (Blueprint $table) {
            $table->dropColumn('Dokumen'); // Menghapus kolom Dokumen jika rollback
        });
    }
};
