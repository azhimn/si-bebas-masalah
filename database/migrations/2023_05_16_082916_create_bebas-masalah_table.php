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
        Schema::create('bebas-masalah', function (Blueprint $table) {   // This table could be merged with mahasiswa
            $table->increments('id_bm');
            $table->year('tahun_lulus');

            // perpus
            $table->boolean('status_perpus');
            $table->string('catatan_perpus');

            // keuangan
            $table->boolean('status_keuangan');
            $table->string('catatan_keuangan');

            // TA
            $table->string('lembar_persetujuan')->nullable;
            $table->string('lembar_pengesahan')->nullable;
            $table->string('lembar_konsultasi_dospem_1')->nullable;
            $table->string('lembar_konsultasi_dospem_2')->nullable;
            $table->string('lembar_revisi')->nullable;

            $table->unsignedInteger('fk_mahasiswa')->constrained('mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bebas-masalah');
    }
};
