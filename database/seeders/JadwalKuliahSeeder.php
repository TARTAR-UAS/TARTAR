<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwal_kuliah')->insert([
            [
        
                'mata_kuliah' => 'Algoritma dan Pemrograman',
                'hari' => 'Senin',
                'jam_mulai' => '08:00',
                'jam_selesai' => '09:40',
                'ruang' => 'Lab A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mata_kuliah' => 'Struktur Data',
                'hari' => 'Rabu',
                'jam_mulai' => '10:00',
                'jam_selesai' => '11:40',
                'ruang' => 'Ruang 204',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mata_kuliah' => 'Basis Data',
                'hari' => 'Jumat',
                'jam_mulai' => '13:00',
                'jam_selesai' => '14:40',
                'ruang' => 'Lab B',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

