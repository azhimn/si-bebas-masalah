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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->char('nama');
            $table->enum('status', ['Dosen', 'Staff']);
            // $table->enum('level', ['Admin', 'TA', 'Keuangan', 'Perspustakaan'])->nullable;
            $table->char('nik', 16)->unique();
            $table->string('nip')->unique()->nullable();
            $table->string('nidn')->unique()->nullable();
            $table->string('email')->unique();  // this can be removed if condition applies (acces emails from users' table)
                                                // removing this can minimize redudancy, inconsistency and space
                                                // removing this may slightly increase server load (need to access users table for emails)
                                                // however, server load can be minimized by storing current users' email on local storage (dunno about the security tho)
            $table->string('telp')->unique();
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Konghucu', 'Kristen']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->unsignedInteger('fk_prodi')->constrained('prodi');
            $table->unsignedInteger('fk_users')->constrained('users');       // activate this is users table is needed
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
