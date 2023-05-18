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
            $table->increments('id');
            // $table->boolean('status_sb');
            // $table->enum('ukt', ['Lunas', 'Belum Dibayar', 'Cicil']);
            $table->string('lembar_persetujuan')->nullable;
            $table->string('lembar_pengesahan')->nullable;
            $table->string('lembar_konsultasi_dospem1')->nullable;
            $table->string('lembar_konsultasi_dospem2')->nullable;  //tahun lulus
            $table->string('lembar_revisi')->nullable;
            $table->unsignedInteger('mahasiswa_id');
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
