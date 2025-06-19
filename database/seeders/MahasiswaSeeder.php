<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $userId = DB::table('users')->insertGetId([
            'email' => 'mahasiswa1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Mahasiswa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $mahasiswaId = DB::table('mahasiswa')->insertGetId([
            'user_id' => $userId,
            'npm' => '5352001',
            'nama_depan' => 'Andi',
            'nama_belakang' => 'Wijaya',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'tanggal_lahir' => '2003-04-20',
            'tempat_lahir' => 'Jakarta',
            'alamat' => 'Jl. Merdeka No.1',
            'no_telp' => '08123456789',
            'angkatan' => '2021',
            'program_studi' => 'Teknik Informatika',
            'fakultas' => 'Teknik',
            'status_perkuliahan' => 'Aktif',
            'status_akun' => 'Verified',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Buat histori pendidikan
        DB::table('histori_pendidikan')->insert([
            'mahasiswa_id' => $mahasiswaId,
            'nama_sekolah' => 'SMA Negeri 1 Jakarta',
            'jenis_sekolah' => 'SMA',
            'jurusan' => 'IPA',
            'tanggal_masuk' => Carbon::create('2018', '07', '15'),
            'tanggal_lulus' => Carbon::create('2021', '05', '30'),
            'lokasi_sekolah' => 'Jakarta',
            'nilai_akhir' => 82,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Buat data orangtua
        DB::table('orangtua')->insert([
            'mahasiswa_id' => $mahasiswaId,
            'nama_ayah' => 'Budi Santoso',
            'pekerjaan_ayah' => 'Pegawai Negeri',
            'no_telp_ayah' => '081111111111',
            'nama_ibu' => 'Sari Dewi',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'no_telp_ibu' => '082222222222',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    } 
}
