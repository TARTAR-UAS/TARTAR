<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataKuliah::create(['kode' => 'MK001', 'nama' => 'Algoritma', 'sks' => 3]);
        MataKuliah::create(['kode' => 'MK002', 'nama' => 'Struktur Data', 'sks' => 4]);
        MataKuliah::create(['kode' => 'MK003', 'nama' => 'Basis Data', 'sks' => 3]);
        MataKuliah::create(['kode' => 'MK004', 'nama' => 'Jaringan Komputer', 'sks' => 3]);
        MataKuliah::create(['kode' => 'MK005', 'nama' => 'Pemrograman Web', 'sks' => 4]);
    }
}
