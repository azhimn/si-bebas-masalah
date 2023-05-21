<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Jurusan
        DB::table('pegawai')->insert([
            'nama' => 'Nama Dosen',
            'dosen' => '1',
            'nik' => '0123456789101112',
            'password' => bcrypt('qweasdzxc'),
            'role' => '1',
            'email' => 'dosen@institusi.id',
            'telp' => '02179182676',
            'alamat' => 'Jalan-jalan yang lurus',
            'tanggal_lahir' => Carbon::parse('2000-01-01'),
            'agama' => 'Buddha',
            'jenis_kelamin' => 'laki-laki',
        ]);
        DB::table('jurusan')->insert([
            'nama' => 'Teknik Elektro',
            'kode' => 'A',
            'fk_kajur' => '1',
        ]);
    }
}
