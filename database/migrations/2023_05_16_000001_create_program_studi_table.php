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
            $table->char('kode', 1);
            $table->enum('jenjang', ['D2', 'D3', 'D4']);
            $table->unsignedInteger('fk_jurusan');
            $table->unsignedInteger('fk_kaprodi');
            // $table->foreign('fk_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            // $table->foreign('fk_kaprodi')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
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
