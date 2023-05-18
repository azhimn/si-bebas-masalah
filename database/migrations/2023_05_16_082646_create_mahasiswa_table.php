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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id_mahasiswa');
            // $table->string('username')->unique();    // activate this if users table isn't needed.
            // $table->string('password');              // activate this if users table isn't needed.
            $table->char('nama');
            $table->char('nim', 10)->unique();
            $table->year('angkatan');
            $table->enum('kelas', ['A', 'B', 'C', 'D']);
            // $table->string('email')->unique();  // this can be removed if condition applies (acces emails from users' table)
                                                // removing this can minimize redudancy, inconsistency and space
                                                // removing this may slightly increase server load (need to access users table for emails)
                                                // however, server load can be minimized by storing current users' email on local storage (dunno about the security tho)
            $table->char('telp', 13)->unique();
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Konghucu', 'Kristen']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->unsignedInteger('fk_prodi')->constrained('prodi');
            $table->unsignedInteger('fk_users')->constrained('users');       // activate this is users table is needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
