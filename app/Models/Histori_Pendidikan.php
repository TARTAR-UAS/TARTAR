<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Histori_Pendidikan extends Model
{
    protected $table = 'histori_pendidikan';

      protected $fillable = [
        'mahasiswa_id',
        'nama_sekolah',
        'jenis_sekolah',
        'jurusan',
        'lokasi_sekolah',
        'nilai_akhir',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
