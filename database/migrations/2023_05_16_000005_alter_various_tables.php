<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurusan', function (Blueprint $table) {
            $table->foreign('fk_kajur')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
        });

        Schema::table('program_studi', function (Blueprint $table) {
            $table->foreign('fk_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            $table->foreign('fk_kaprodi')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
        });

        Schema::table('pegawai', function (Blueprint $table) {
            $table->foreign('fk_prodi')->references('id_prodi')->on('program_studi')->onDelete('cascade')->nullable();
        });

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->foreign('fk_prodi')->references('id_prodi')->on('program_studi')->onDelete('cascade');
        });

        Schema::table('bebas_masalah', function (Blueprint $table) {
            $table->foreign('fk_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Rollback the modifications if needed
    }
};
