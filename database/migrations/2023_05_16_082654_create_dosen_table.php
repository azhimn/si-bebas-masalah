<?php

use Egulias\EmailValidator\Warning\TLD;
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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            // $table->string('username')->unique();    // activate this if users table isn't needed.
            // $table->string('password');              // activate this if users table isn't needed.
            $table->string('nama');
            $table->set('akses', ['Admin', 'TA', 'Keuangan', 'Perspustakaan'])->nullable;
            $table->string('nip')->unique()->nullable();
            $table->string('nidn')->unique();
            $table->string('email')->unique();  // this can be removed if condition applies (acces emails from users' table)
                                                // removing this can minimize redudancy, inconsistency and space
                                                // removing this may slightly increase server load (need to access users table for emails)
                                                // however, server load can be minimized by storing current users' email on local storage (dunno about the security tho)
            $table->string('telp')->unique();
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Konghucu', 'Kristen']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('jurusan_id');
            $table->foreignID('user_id');       // activate this is users table is needed
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
