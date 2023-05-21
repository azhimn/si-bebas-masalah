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
            $table->char('nama', 50);
            $table->char('nim', 10)->unique();          // username
            $table->string('password');
            $table->tinyInteger('role')->default(0);    // 0 = Mahasiswa, 1 = Kajur, 2 = Prodi, 3 =  TA, 4 = Keuangan, 5 = Perpus
            $table->year('angkatan');
            $table->enum('kelas', ['A', 'B', 'C', 'D']);
            $table->string('email')->unique();  // this can be removed if condition applies (acces emails from users' table)
                                                // removing this can minimize redudancy, inconsistency and space
                                                // removing this may slightly increase server load (need to access users table for emails)
                                                // however, server load can be minimized by storing current users' email on local storage (dunno about the security tho)
            $table->char('telp', 13)->unique();
            $table->string('alamat', 50);
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Konghucu', 'Kristen']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->unsignedInteger('fk_prodi');
            // $table->foreign('fk_prodi')->references('id_prodi')->on('program_studi')->onDelete('cascade');
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
