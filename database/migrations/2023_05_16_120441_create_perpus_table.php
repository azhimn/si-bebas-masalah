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
        Schema::create('perpus', function (Blueprint $table) {
            $table->increments('id_perpus');
            $table->string('judul_buku');
            $table->date('peminjaman');
            $table->date('pengembalian');
            $table->integer('denda');
            $table->boolean('status')->default(0);
            $table->unsignedInteger('fk_mahasiswa')->constrained('mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpus');
    }
};
