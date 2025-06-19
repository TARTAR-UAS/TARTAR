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
                'mahasiswa_id' => '1',
                'mata_kuliah_id' => '1',
                'nilai' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => '1',
                'mata_kuliah_id' => '2',
                'nilai' => 'B+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => '1',
                'mata_kuliah_id' => '3',
                'nilai' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        
        ]);
    }
}
