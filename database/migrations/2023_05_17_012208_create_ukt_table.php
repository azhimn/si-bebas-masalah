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
        Schema::create('ukt', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('golongan_ukt', ['I', 'II', 'III', 'IV', 'V', 'Axioo']);
            $table->integer('biaya_ukt');
            $table->integer('beasiswa')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('cicil');
            $table->date('tenggat_bayar');
            $table->date('tenggat_cicil')->nullable();
            $table->unsignedInteger('mahasiswa_id')->constrained('mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukt');
    }
};
