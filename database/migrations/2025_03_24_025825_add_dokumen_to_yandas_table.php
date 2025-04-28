<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('yandas', function (Blueprint $table) {
            $table->string('Dokumen')->nullable()->after('Kategori'); // Menambahkan kolom Dokumen setelah Kategori
        });
    }

    public function down()
    {
        Schema::table('yandas', function (Blueprint $table) {
            $table->dropColumn('Dokumen');
        });
    }
};

