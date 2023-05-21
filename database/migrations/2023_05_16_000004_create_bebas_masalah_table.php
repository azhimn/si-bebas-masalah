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
        Schema::create('bebas_masalah', function (Blueprint $table) {   // This table could be merged with mahasiswa
            $table->increments('id_bm');
            $table->year('tahun_lulus');

            // perpus
            $table->boolean('status_perpus');
            $table->string('catatan_perpus');
            $table->dateTimeTz('tanggal_update_perpus');

            // keuangan
            $table->boolean('status_keuangan');
            $table->string('catatan_keuangan');
            $table->dateTimeTz('tanggal_update_keuangan');

            // TA
            $table->boolean('status_TA');
            $table->string('lembar_persetujuan', 100)->nullable();
            $table->string('lembar_pengesahan', 100)->nullable();
            $table->string('lembar_konsultasi_dospem_1', 100)->nullable();
            $table->string('lembar_konsultasi_dospem_2', 100)->nullable();
            $table->string('lembar_revisi', 100)->nullable();
            $table->string('catatan_ta');
            $table->dateTimeTz('tanggal_update_TA');

            $table->unsignedInteger('fk_mahasiswa');
            // $table->foreign('fk_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebas_masalah');
    }
};
