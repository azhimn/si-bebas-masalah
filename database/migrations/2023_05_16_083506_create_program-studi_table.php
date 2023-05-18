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
        Schema::create('program-studi', function (Blueprint $table) {
            $table->increments('id_prodi');
            $table->char('nama_prodi');
            $table->string('kode_prodi');
            $table->enum('jenjang_prodi', ['Sarjana', 'Diploma']);
            $table->integer('tingkat_jenjang_prodi', ['1', '2', '3', '4']);
            $table->year('tahun_prodi')->nullable();
            $table->unsignedInteger('fk_jurusan')->constrained('jurusan');
            $table->unsignedInteger('fk_kaprodi')->constrained('pegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program-studi');
    }
};
