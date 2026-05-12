<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('yandas', function (Blueprint $table) {
            $table->string('Jenis_Dokumen')->nullable();
        });

        Schema::table('tu', function (Blueprint $table) {
            $table->string('Jenis_Dokumen')->nullable();
        });

        Schema::table('npd', function (Blueprint $table) {
            $table->string('Jenis_Dokumen')->nullable();
        });

        Schema::table('bms', function (Blueprint $table) {
            $table->string('Jenis_Dokumen')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('yandas', function (Blueprint $table) {
            $table->dropColumn('Jenis_Dokumen');
        });

        Schema::table('tu', function (Blueprint $table) {
            $table->dropColumn('Jenis_Dokumen');
        });

        Schema::table('npd', function (Blueprint $table) {
            $table->dropColumn('Jenis_Dokumen');
        });

        Schema::table('bms', function (Blueprint $table) {
            $table->dropColumn('Jenis_Dokumen');
        });
    }
};
