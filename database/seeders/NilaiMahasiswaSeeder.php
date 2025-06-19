<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nilai_mahasiswa')->insert([
            [
                'nama' => '5352001', 
                'nama_mata_kuliah' => 'Algoritma dan Pemrograman',
                'sks' => 3,
                'nilai' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => '5352001',
                'nama_mata_kuliah' => 'Struktur Data',
                'sks' => 3,
                'nilai' => 'B+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => '5352001',
                'nama_mata_kuliah' => 'Basis Data',
                'sks' => 3,
                'nilai' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        
        ]);
    }
}
