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
        Schema::create('program_studi', function (Blueprint $table) {
            $table->increments('id_prodi');
            $table->char('nama', 50);
            $table->char('jenjang', 2);
            $table->char('akreditasi', 1);
            $table->char('kode_prodi', 1);
            $table->year('tahun_beridi');
            $table->unsignedInteger('fk_jurusan');
            $table->unsignedInteger('fk_kaprodi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studi');
    }
};
