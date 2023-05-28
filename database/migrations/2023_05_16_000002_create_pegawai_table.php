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
            $table->char('nama', 50);
            $table->boolean('dosen');                   // 0 = staff, 1 = dosen
            $table->char('nik', 16)->unique();          // username
            // $table->string('password');
            // $table->tinyInteger('role')->default(1);    // 0 = Mahasiswa, 1 = Kajur, 2 = Prodi, 3 =  TA, 4 = Keuangan, 5 = Perpus
            $table->char('nip', 18)->unique()->nullable();
            $table->char('nidn', 10)->unique()->nullable();
            $table->string('email', 30)->unique();  // this can be removed if condition applies (acces emails from users' table)
                                                // removing this can minimize redudancy, inconsistency and space
                                                // removing this may slightly increase server load (need to access users table for emails)
                                                // however, server load can be minimized by storing current users' email on local storage (dunno about the security tho)
            $table->string('telp', 13)->unique();
            $table->string('alamat', 50);
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Konghucu', 'Kristen']);
            $table->boolean('jenis_kelamin');   //0 = Laki-laki, 1 = Perempuan
            $table->unsignedInteger('fk_prodi')->nullable();
            $table->unsignedInteger('fk_user');
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
