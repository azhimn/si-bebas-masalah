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
            $table->id();
            $table->boolean('status_sb');
            // anotha condition like ukt, perpus etc
            // **
            $table->enum('ukt', ['Lunas', 'Belum Dibayar', 'Cicil']);

            // change column name later
            $table->string('dok_1')->nullable;
            $table->string('dok_2')->nullable;
            $table->string('dok_3')->nullable;
            $table->string('dok_4')->nullable;
            $table->string('dok_5')->nullable;
            $table->string('dok_6')->nullable;
            $table->foreignId('mahasiswa_id');
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
